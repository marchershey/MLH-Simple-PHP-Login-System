<?php
  # Require the Registraiton Class
  require_once 'class.register.php';
  # Define undefined variables
  $user = "";
  $pass = "";
  $conf = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") { # Check if the registration form was submitted
    # The registration form was submitted, continue
    # Sanitize the user's data and set them to smaller variables while were at it.
    $user = sanitize($_POST['username']);
    $pass = sanitize($_POST['password']);
    $conf = sanitize($_POST['confirm']);
    # Note: Encryption happens right before inserting the data into the database
    # Grab the user's IP address and set it to a variable.
    $ip = $_SERVER['REMOTE_ADDR'];
    # Make sure the user has a valid IP Address
    if(filter_var($ip, FILTER_VALIDATE_IP)){
      # Valid IP Address, continue
      # Check if any of the fields were empty.
      # Note: The "required" attribute on the input fields takes care of this, but there are ways around that.
      if(!empty($user) && !empty($pass) && !empty($conf)){
        # No fields were empty, continue
        # Check if passwords are the same
        if($pass == $conf){
          # The passwords were the same, continue
          # Check if the password is long enough
          if(strlen($pass) >= $global['config']['password']['minLength']){
            # The password was long enough, continue
            # Check if the username is long enough
            if(strlen($user) >= $global['config']['username']['minLength']){
              # The username was long enough, continue
              # All other checks need a database connection, so let's execute and place the results in a variable
              $results = (new Register)->execute($user, $pass, $ip);
              # Check if the results returned a boolean because it will either return true, or return the reason why it failed in a string
              if(is_bool($results)){
                # The results returned a boolean (true)
                # Redirect to the login with successful registration message by using a GET request (?register) to let user know registration was successful
                redirect("login.php?register");
              }else{
                # The results returned a string, show error with results
                $alert = array($results, "error");
              }
            }else{
              # The username was not long enough, show error
              $alert = array("Your username must be ".$global['config']['username']['minLength']." chars or more.", "error");
            }
          }else{
            # The password was not long enough, show error
            $alert = array("Your password must be ".$global['config']['password']['minLength']." chars or more.", "error");
          }
        }else{
          # The passwords were not the same, show error
          $alert = array("Your passwords do not match", "error");
        }
      }else{
        # There was an empty field. Show error.
        $alert = array("All fields are required.", "error");
      }
    }else{
      # The IP Address was not valid. Show error.
      $alert = array($ip." is not a valid IP Address.", "error");
    }
  }
