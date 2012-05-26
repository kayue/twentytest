# Twenty Test Theme

This theme shows how to use [WordPressUnitTest](https://github.com/kayue/WordPressUnitTest) to help with testing theme. It run test against functions inside `functions.php`.

## Usage

Simply run the `phpunit` command. An example output:

```
$ phpunit 
PHPUnit 3.6.4 by Sebastian Bergmann.

Configuration read from /Users/user/Sites/wordpress/wp-content/themes/twentytest/phpunit.xml

.....

Time: 0 seconds, Memory: 21.00Mb

OK (5 tests, 10 assertions)
```

## Install

1. Include [wordpress-tests](https://github.com/nb/wordpress-tests) through Git submodule. Run the following command to initialize submodule for the first time:

	```
	$ git submodule init
	```

2. Pull down / update the submodule:

	```
	$ git submodule update
	```

3. Create config file. Copy `vendors/wordpress-tests/unittests-config-sample.php` to `vendors/wordpress-tests/unittests-config.php`.
4. Edit the config file. 
5. Since the tests will be running on a separated Wordpress installation, please **use a new database, because all the data inside will be deleted** to create a clean environment .

## Usage

### Setup Test Environment

Edit `tests/bootstrap.php` to set the WordPress environment (activate theme and plugins).

Example:

```php
<?php
$GLOBALS['wp_tests_options'] = array(
    // parent theme.
    'template' => 'twentyeleven',
    
    // child theme, set to the same as parent theme if not a child theme.
    'stylesheet' => 'twentytest',
    
    // activate plugins.
    'active_plugins' => array(
    	'hello.php',
    ),
);
```

### Write Test Case

All test cases should extend `WpTestCase` instead of `PHPUnit_TestCase`. It will revert you changes to database after each test case to keep the environment clean, and provide some helper methods like `request($url)` and `insertQuickPosts(20)`.