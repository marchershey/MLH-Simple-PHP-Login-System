<?php

  require_once 'class.login.php';

  # Define undefined variables used to set the input values
  $user = "";
  # Check if the login form was submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # Login form was submitted, continue
    # Sanitize the user's data and set them to smaller variables while were at it.
    $user = sanitize($_POST['username']); # the user's username
    $pass = sanitize($_POST['password']); # the user's password
    # Grab the user's IP address and set it to a variable.
    $ip = $_SERVER['REMOTE_ADDR'];
    # Check if any of the fields were empty. The "required" attribute on the input fields takes care of this, but there are ways around that.
    if(!empty($user) && !empty($pass)){
      # No fields were empty, continue
      # Make sure we have a valid IP Address
      if(filter_var($ip, FILTER_VALIDATE_IP)){
        # IP Address was valid, continue
        # Execute the login method
        $result = (new Login)->execute($user, $pass);
        # Check if the execution returned true
        if($result){
          # The execution returned true
          # Set the user's session details
          $_SESSION['user'] = $user;
          # Redirect the user to the page that has been set
          redirect($global['config']['loginRedirect']);
        }else{
          # The execution did not return true
          # Show error with the reason the login failed
          $alert = array("Incorrect username and/or password.", "error");
        }
      } else {
        # The IP Address was not valid. Show error.
        $alert = array($ip." is not a valid IP Address.", "error");
      }
    }else{
      # There was an empty field. Show error.
      $alert = array("All fields are required.", "error");
    }
  }

  # GET Requests to show an alert on a particular action

  # Show alert if the user successfully registered
  if(isset($_GET['register'])){
    $alert = array("Account created! You may now login.", "success");
  }

  # Show alert if the user tried to visit a secured page
  if(isset($_GET['secured'])){
    $alert = array("You must log in to view that page.", "error");
  }

  # Show alert if the user just logged out
  if(isset($_GET['logout'])){
    $alert = array("You have been logged out.", "primary");
  }
