<?php

  # MLH - Simple PHP Login System
  # Create by: Marc Hershey - https://github.com/marchershey
  # Version: 1.0.1

  session_start();

  $global['database'] = array(
    # Edit your database details below
    'host'      => 'localhost', # the address or hostname to your database server
    'username'  => 'root', # the username to your database server
    'password'  => '', # the password to your database server
    'dbname'    => 'simple-login', # the database name you're using
    # I don't recommend changing the table name
    'table'     => 'users'  # change this if you have changed your users table
  );

  # SITE INFORMATION
  $global['site'] = array(
    'url' => 'http://192.168.1.99/projects/mlh-php-super-simple-login/app/public_html', # no trailing slash
    'name' => 'MLH Simple Login', # this is your websites name
    'tagline' => 'A Super Simple Login System built with PHP', # this is your website's tagline. Leave blank if you don't have one.
    'meta' => array( # HTML Meta Informaiton
      'author' => 'Marc Hershey', # Author Meta Tag
      'description' => 'This site is using MLH - Simple PHP Login System', # Description Meta Tag
      'keyword' => 'MLH Simple PHP Login System' # Keywork Meta Tag
    ),
    'favicon' => array( # favicon details
      'enabled' => false, # enable or disable your favicon (true, false)
      'path' => 'path/to/favicon.ico' # path/url to favicon ico file
    )
  );

  # SITE CONFIG
  $global['config'] = array(
    # Where should the user be redirected to after successful login?
    'loginRedirect' => 'secured-page.php', # The page where the user is redirected after successful login
    # Username & Password settings
    'username' => array(
      'minLength' => 3 # The minimum length the username must be
    ),
    'password' => array(
      'minLength' => 6 # the minimum length the password must be
    ),
    # Debugging Options - More options will come in the near future
    'error_reporting' => false, # If ture, PHP warnings will be displayed - this should only be true when debugging (true, false)
    # Encryption Options
    'encryption_options' => array(
      'cost' => 8 # Denotes the algorithmic cost that should be used during password encryption.
      # I do not recommend you to change the cost, unless you know what you're doing.
      # More info: http://php.net/manual/en/function.password-hash.php
    )
  );

  # GLOBAL ALERT
  # This simply shows an alert on all pages
  # If you would like to show an alert on every page, set 'enabled' to true and edit the 'content'
  $global['global_alert'] = array(
    'enabled' => true, # set to true to show message (true, false)
    'type' => '', # This is the class of the Bootstrap Alert - More information: https://getbootstrap.com/docs/4.0/components/alerts/
    'class' => '', # If you would like to add any additional classes to the global alert, add them here seperated by spaces
    'content' => 'Global Alert is on. <a href="">More info</a>' # This is the message displayed in the global alert
    );

  # Error Reporting - if error_reporting is true in $global (line 24), php warnings will be visible.
  # Code that breaks PHP will still show. you need to edit your php.ini file to disable all errors.
  error_reporting($global['config']['error_reporting'] ? -1 : 0);

  require_once 'functions.php';
  require_once 'class.database.php';

?>
