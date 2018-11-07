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
                <button class="btn m-2">flex challenge</button>
                <button class="btn m-2">gorilla wear</button>
                <button class="btn m-2">onzie flow</button>
                <button class="btn m-2">brazil wear</button>
                <button class="btn m-2">lanton sport</button>
                <button class="btn m-2">orange fit</button>
            </div>
        </div>
        <div class="box">
            <div class="title">Get Social</div>
            <div class="content social">
                <button class="btn m-2"><span class="btn-fab"><span class="mdi mdi-facebook"></span></span>Facebook</button>
                <button class="btn m-2"><span class="btn-fab"><span class="mdi mdi-instagram"></span></span>Instagram</button>
                <button class="btn m-2"><span class="btn-fab"><span class="mdi mdi-youtube"></span></span>Youtube</button>
                <button class="btn m-2"><span class="btn-fab"><span class="mdi mdi-twitter"></span></span>Twitter</button>
                <button class="btn m-2"><span class="btn-fab"><span class="mdi mdi-pinterest"></span></span>Pinterest</button>
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