<div id="searchpage">
    <form action="<?php echo home_url('/'); ?>" role="search" method="get" id="searchform">
        <div class="searchbar">
            <input class="m-2" name="s" type="text" id="searchstring" placeholder="Search anything you like..." onblur="inputCheck(this)">
            <button class="btn m-2"><span class="mdi mdi-send"></span></button>
        </div>    
    </form>
    <div class="block" onclick="toggleSearchPage();"></div>
</div>