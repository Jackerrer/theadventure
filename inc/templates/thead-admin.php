<h1>TheAd Theme Option</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php settings_fields('thead-settings-group'); ?>
    <?php do_settings_sections('jackerrer_thead'); ?>
    <?php submit_button(); ?>
</form>