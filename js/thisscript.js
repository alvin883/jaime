'use strict';

//QVFCYnlEeEZ0ZWJpaWx2UGFGXzFwblZ3X3N6eGpYQVFvN0U1Znh1cE44QTZMZUVpVmIwaXZzSmplRHpaUWE5MWR2M0xWU01pU1c1RHNpdFRUdnRTMWM2Yg==
var InstagramNext = 'https://www.instagram.com/graphql/query/?query_hash=5b0222df65d7f6659c9b82246780caa7&variables=%7B%22id%22%3A%228531851046%22%2C%22first%22%3A12%2C%22after%22%3A%22QVFDWE1JcWRSaWZ0RG43VU96dW0zeS1DckdfdWZjR0lBSXFjQk4xUmN2THphT2NPaEQwbV9yMFJaWmRCbmhJTkxmQlNSak9QMGRmWG9zSlZkZnJHWDBwWA%3D%3D%22%7D';
InstagramNext = decodeURIComponent(InstagramNext);
console.log(InstagramNext);

console.log('changed');

//window.onbeforeunload = function () {
//	window.scrollTo(0, 0);
//}

function toggleNav() {
	// Check , is #sidenav active ?
	var active = jQuery('nav').hasClass('active');

	if (!active) return jQuery('nav').addClass('active');
	return jQuery('nav').removeClass('active');
}

function toggleSearch() {
	// Check , is #searchbar active ?
	var active = jQuery('#searchbar').hasClass('active');

	if (!active) {
		jQuery('#s').trigger('focus');
		return jQuery('#searchbar').addClass('active');
	}
	jQuery('#searchbutton').trigger('focus');
	return jQuery('#searchbar').removeClass('active');
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
	//document.getElementById('searchform').onsubmit = function () {
	//	return submitSearch();
	//};
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

function slider_next(e){
	var current = jQuery(e).parent().attr('data-slider') ? parseFloat(jQuery(e).parent().attr('data-slider')) : 0,
	content = jQuery(e).parent().find('.content'),
	parentWidth = jQuery(e).parent().width(),
	itemWidth = 326,
	viewableItem = parseInt(parentWidth / itemWidth),
	hiddenItem = ( parentWidth / itemWidth - parseInt(parentWidth / itemWidth) ) / 2,
	newVal = current - (itemWidth * (viewableItem));

	if(((newVal - (itemWidth * viewableItem)) * - 1) >= content.width()){
		jQuery(e).css('display','none');
		newVal = 0 - content.width() + parentWidth;
	}

	jQuery(e).parent().find('.prev').css('display','block');
	jQuery(e).parent().attr('data-slider',newVal);
	content.css({'left': newVal + 'px'});
}
function slider_prev(e){
	var current = jQuery(e).parent().attr('data-slider') ? parseFloat(jQuery(e).parent().attr('data-slider')) : 0,
	content = jQuery(e).parent().find('.content'),
	parentWidth = jQuery(e).parent().width(),
	itemWidth = 326,
	viewableItem = parseInt(parentWidth / itemWidth),
	hiddenItem = ( parentWidth / itemWidth - parseInt(parentWidth / itemWidth) ),
	newVal = current + (itemWidth * (viewableItem));

	if(newVal >= 0){
		jQuery(e).css('display','none');
		newVal = 0;
	}

	jQuery(e).parent().find('.next').css('display','block');
	jQuery(e).parent().attr('data-slider',newVal);
	content.css({'left': newVal + 'px'});
}