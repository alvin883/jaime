    <div id="footer">
        <div class="subscribe">
            <div class="title">Subscribe to my Newsletter and receive latest posts in your Inbox!</div>
            <div class="form" id="subscribe">
                <input type="text" class="name m-2" placeholder="Your Name" onblur="inputCheck(this)"/>
                <input type="email" class="email m-2" placeholder="Your Email" onblur="inputCheck(this)"/>
                <button class="btn m-2"><span class="mdi mdi-send"></span></button>
            </div>
        </div>
        <div class="box sponsor">
            <div class="title">SPONSORS</div>
            <div class="content">
            <?php 
                if(theme_options('general_sponsors')){
                    foreach (theme_options('general_sponsors') as $value) {
            ?>
                
                        <button class="btn m-2"><?php echo $value; ?></button>
            <?php
                    }
                }
            ?>
            </div>
        </div>
        <div class="box">
            <div class="title">Get Social</div>
            <div class="content social">
				<?php
                    if(theme_options('general=social') != ''){
						$social_icons = get_social_media_icons();
                        foreach (theme_options('general=social') as $key => $value) {

                            if(array_key_exists($key,$social_icons) && $value != '' && !empty($value)){
                                ?>
                                    <button class="btn m-2"><span class="btn-fab">
                                        <span class="mdi mdi-<?php echo $social_icons[$key]; ?>"></span></span><?php echo $social_icons[$key]; ?>
                                    </button>
                                <?php
                            }

                        }
                    }
                ?>
            </div>
        </div>
        <img src="<?php if(theme_options('general=nav_logo',false,'url') != ''){echo theme_options('general=nav_logo',false,'url');} ?>" alt="Jaime Logo" class="logo"> 
        <div class="wrapper_backtotop">
            <a onclick="scrollToTop()">Back to top</a>
        </div>
        <div class="copyright">Copyright <?php echo date("Y");?> - Daily Jaime - by HeadLab</div>
    </div>
</body>
</html>