# Twenty Test theme

This theme shows how to use Nikolay's [wordpress-tests](https://github.com/nb/wordpress-tests) to help with testing theme.

For more information, please see [Unit Testing WordPress Plugins](http://stackoverflow.com/questions/9138215/unit-testing-wordpress-plugins).

## Install

Activate the theme

1. Copy `vendors/wordpress-tests/unittests-config-sample.php` to `vendors/wordpress-tests/unittests-config.php`
2. Edit the config. Use a new database, because all the data inside will be deleted.
3. Test database's default theme is TwentyEleven, you will need to update the stylesheet option in the test database

	```
	UPDATE `wp_options` SET `option_value` = 'twentytest' WHERE `option_name` = 'stylesheet';
	```