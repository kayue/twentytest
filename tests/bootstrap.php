<?php

include('./vendors/WordPressUnitTest/WordPressUnitTest.php');

WordPressUnitTest::init(array(
    // parent theme.
    'template' => 'twentyeleven',

    // child theme, set to the same as parent theme if not a child theme.
    'stylesheet' => 'twentytest',
));