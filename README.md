# Twenty Test Theme

This theme shows how to use Nikolay's [wordpress-tests](https://github.com/nb/wordpress-tests) to help with testing theme. It run test against functions inside `functions.php`.

For more information, please also see [Unit Testing WordPress Plugins](http://stackoverflow.com/questions/9138215/unit-testing-wordpress-plugins).

## Install

1. Create config file. Copy `vendors/wordpress-tests/unittests-config-sample.php` to `vendors/wordpress-tests/unittests-config.php`.
2. Edit the config file. 
3. Since the tests will be running on a separated Wordpress installation, please **use a new database, because all the data inside will be deleted** to create a clean environment .
4. The test database's default theme is TwentyEleven, you will need to switch the theme to `twentytest` by updating the stylesheet option in the options table.

	```
	UPDATE `wp_options` SET `option_value` = 'twentytest' WHERE `option_name` = 'stylesheet';
	```

## Todo

* The current setup seems only run tests in a new Wordpress instance without any plugin activated. Should make pre-activate plugin possible because some themes are heavily rely on some plugins. Like BBPress, Buddypress etc.