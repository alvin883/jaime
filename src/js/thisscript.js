'use strict';

//QVFCYnlEeEZ0ZWJpaWx2UGFGXzFwblZ3X3N6eGpYQVFvN0U1Znh1cE44QTZMZUVpVmIwaXZzSmplRHpaUWE5MWR2M0xWU01pU1c1RHNpdFRUdnRTMWM2Yg==
//var InstagramNext = 'https://www.instagram.com/graphql/query/?query_hash=5b0222df65d7f6659c9b82246780caa7&variables=%7B%22id%22%3A%228531851046%22%2C%22first%22%3A12%2C%22after%22%3A%22QVFDWE1JcWRSaWZ0RG43VU96dW0zeS1DckdfdWZjR0lBSXFjQk4xUmN2THphT2NPaEQwbV9yMFJaWmRCbmhJTkxmQlNSak9QMGRmWG9zSlZkZnJHWDBwWA%3D%3D%22%7D';
//InstagramNext = decodeURIComponent(InstagramNext);
//console.log(InstagramNext);

console.log('DEV MODE');

function toggleNav() {
	// Check , is #sidenav active ?
	var active = jQuery('nav').hasClass('active');

	if (!active) return jQuery('nav').addClass('active');
	return jQuery('nav').removeClass('active');
}

function toggleSearchPage() {
	// Check , is #searchpage active ?
	var active = jQuery('#searchpage').hasClass('active');

	if (!active) {
		//jQuery('#s').trigger('focus');
		return jQuery('#searchpage').addClass('active');
	}
	//jQuery('#searchbutton').trigger('focus');
	return jQuery('#searchpage').removeClass('active');
}

function submitSearch() {
	var search = jQuery('#s').val();
	if (!search) return false;
}

function gotoURL(e) {
	window.location = jQuery(e).attr('data-url');
}

function inputCheck(e) {
	var value = jQuery(e).val();
	if (value && value != '') {
		jQuery(e).addClass('active');
	} else {
		jQuery(e).removeClass('active');
	}
}

function scrollToTop(){
	$("html, body").animate({ scrollTop: 0 }, 300);
}

jQuery(document).ready(function () {
	easeSwipe_slider_init();
});

jQuery(document).scroll(function () {
	if (jQuery(window).scrollTop() > 40) {
		jQuery("#topnav").removeClass('purple');
	} else {
		jQuery("#topnav").addClass('purple');
	}
});


/**
 * INSTAGRAM
 */
var Instagram_DEBUG_HTML = '', Instagram = {};
function Instagram_Fecth(instagramID){
	return fetch('https://www.instagram.com/' + instagramID + '/')
		.then(res => res.text())
		.then(txt => {
			Instagram_DEBUG_HTML = txt;
			const doc = Instagram_ParseExplorePage(txt),
				sharedData = Instagram_ExtractSharedData(doc);
			return sharedData;
		})
		.catch(e => {
			console.log('Was unable to reach Instagram');
			console.debug(e);
		})
}

function Instagram_ParseExplorePage(txt){
	const dp = new DOMParser(),
		doc = dp.parseFromString(txt, "text/html");
	return doc;
}

function Instagram_ExtractSharedData(doc){
	const scs = Array.from(doc.querySelectorAll('script')),
		sharedDataRawText = scs.filter(sc => 
			sc.textContent.indexOf('_sharedData') > -1
		)[0];

	if(sharedDataRawText) {
		const sharedDataJSONText = sharedDataRawText.textContent.trim().match(/\=\ (.*);/)[1];
		let sharedData;
		try {
			sharedData = JSON.parse(sharedDataJSONText);
		} catch (e){
			console.log('Failed to parse Instagram data. See `window.__FAIL_TXT`');
			window.__FAIL_TXT = sharedDataJSONText;
		}
		return sharedData;
	}
}

Instagram_Fecth('landscapeswelove')
	.then(sharedData => {
		var data = sharedData.entry_data.ProfilePage[0].graphql.user;
		console.log(data);
		Instagram.DOM = data.edge_owner_to_timeline_media.edges.reduce((acc,val) => {
			return acc + 
				`<div class="item" data-url="https://www.instagram.com/p/`+ val.node.shortcode + `" onclick="gotoURL(this)">
					<img src="` + val.node.thumbnail_src + `"/>
					<div class="detail">
						<span class="mdi mdi-heart"></span><span>` + val.node.edge_liked_by.count + `</span>
						<span class="divider"></span>
						<span class="mdi mdi-comment"></span><span>` + val.node.edge_media_to_comment.count + `</span>
					</div>
				</div>`;
		}, ``);
		Instagram.followers = data.edge_followed_by.count;
		Instagram.posts = data.edge_owner_to_timeline_media.count;
		document.getElementById('instagram_slider').getElementsByClassName('content')[0].innerHTML = Instagram.DOM;
		document.getElementById('instagram_posts').innerHTML = Instagram.posts;
		document.getElementById('instagram_followers').innerHTML = Instagram.followers;
	});



/**
 * Standard Slider
 */
function slider_next(e){
	var parent =  jQuery(e).parent(),
	content = parent.find('.content'),
	current = parent.attr('data-slider') ? parseFloat(parent.attr('data-slider')) : 0,
	parentWidth = parent.width(),
	contentWidth = content.width(),
	itemWidth = content.find('.item').width(),

	viewableItem = parseInt(parentWidth / itemWidth),
	hiddenItem = (( parentWidth / itemWidth ) - viewableItem) / 2,
	newVal = current == 0 ? 
		current - ( viewableItem * itemWidth ) + (hiddenItem * itemWidth) : 
		current - ( viewableItem * itemWidth );

	if( contentWidth + newVal <= parentWidth ){
		jQuery(e).css('display','none');
		newVal = 0 - contentWidth + parentWidth;
	}

	parent.find('.prev').css('display','block');
	parent.attr('data-slider',newVal);
	content.css({'left': newVal + 'px'});

}
function slider_prev(e){
	var parent = jQuery(e).parent(),
	content = parent.find('.content'),
	current = parent.attr('data-slider') ? parseFloat(parent.attr('data-slider')) : 0,
	parentWidth = parent.width(),
	contentWidth = content.width(),
	itemWidth = content.find('.item').width(),

	viewableItem = parseInt(parentWidth / itemWidth),
	hiddenItem = (( parentWidth / itemWidth ) - viewableItem) / 2,
	newVal = contentWidth + current == parentWidth ? 
		current + ( viewableItem * itemWidth ) - (hiddenItem * itemWidth) : 
		current + (itemWidth * viewableItem);
		
	if( newVal >= 0 ){
		jQuery(e).css('display','none');
		newVal = 0;
	}
	
	parent.find('.next').css('display','block');
	parent.attr('data-slider',newVal);
	content.css({'left': newVal + 'px'});
}


/**
 * Ease Swipe Slider
 */
/**
 * Initialize the slider
 */
function easeSwipe_slider_init(){
	jQuery('.easeSwipe_slider').each(function(){
		var id = 1;
		parent = jQuery(this);
		jQuery('.content').find('.item').each(function(){
			jQuery(this).attr('data-id',id);
			if(jQuery(this).hasClass('active')){
				parent.attr('data-slider',id);
			}
			id += 1;
		});
		parent.append(`<button class="next" onclick="easeSwipe_slider_next(this);"></button><button class="prev" onclick="easeSwipe_slider_prev(this);"></button>`);
		
		parent[0].startSlider =  function(){
			parent[0].slideInterval = setInterval(() => {
				console.log('fired');
				easeSwipe_slider_next(parent.find('.next'),false);
			}, 3000);
		};
		parent[0].slideHover = false;
		parent[0].startSlider();
		parent.on("mouseenter",function(){
			parent[0].slideHover = true;
			clearInterval(parent[0].slideInterval);
		}).on("mouseleave",function(){
			parent[0].slideHover = false;
			parent[0].startSlider();
		});
	});
}
function easeSwipe_slider_next(e,human = true){
	var parent = jQuery(e).parent(),
	content = parent.find('.content'),
	current = parseInt(parent.attr('data-slider')),
	newVal = current + 1;

	if(human){
		clearInterval(parent[0].slideInterval);
		if(!parent[0].slideHover) parent[0].startSlider();
	}

	if(newVal > content.find('.item').length){ newVal = 1; }

	content.find('.item.active').removeClass('active');
	content.find('.item[data-id='+ newVal +']').addClass('active');

	parent.attr('data-slider',newVal);
}
function easeSwipe_slider_prev(e,human = true){
	var parent = jQuery(e).parent(),
	content = parent.find('.content'),
	current = parseInt(parent.attr('data-slider')),
	newVal = current - 1;

	if(human){
		clearInterval(parent[0].slideInterval);
		if(!parent[0].slideHover) parent[0].startSlider();
	}

	if(newVal <= 0){ newVal = content.find('.item').length; }

	content.find('.item.active').removeClass('active');
	content.find('.item[data-id='+ newVal +']').addClass('active');

	parent.attr('data-slider',newVal);
}