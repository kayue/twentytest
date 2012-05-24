# Twenty Test Theme

This theme shows how to use Nikolay's [wordpress-tests](https://github.com/nb/wordpress-tests) to help with testing theme. It run test against functions inside `functions.php`.

For more information, please also see [Unit Testing WordPress Plugins](http://stackoverflow.com/questions/9138215/unit-testing-wordpress-plugins).

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