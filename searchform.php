<form action="<?php echo home_url('/'); ?>" role="search" method="get" id="searchform">
    <div id="searchbar">
        <button type="button" class="al-fab" id="searchbutton" onclick="toggleSearch();"><span class="mdi mdi-magnify"></span></button>
        <input type="text" name="s" id="s" placeholder="Searh anything...">
        <button class="al-fab" id="searchbutton_submit"><span class="mdi mdi-keyboard-backspace mdi-rotate-180"></span></button>
        <button type="button" class="al-fab" id="searchbutton_close" onclick="toggleSearch();"><span class="mdi mdi-close"></span></button>
    </div>
</form>