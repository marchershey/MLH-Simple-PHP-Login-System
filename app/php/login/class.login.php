<?php

# PHP class for login
class Login extends Database {

  public function execute($user, $pass){
    # Call $global variable for encryption_options
    global $global;
    # Grab the user's data and place the data in a variable
    if($userdata = $this->fetchRow("SELECT * FROM users WHERE username = ?", [$user])){
      # Grabbing the user's data was successful
      # Check if password matches the encrypted password in the database
      if(password_verify($pass, $userdata['password'])){
        # The passwords match
        return true;
      }else{
        # The passwords do not match
        return false;
      }
    }else{
      # Grabbing the user's data was not successful
      return false;
    }

  }
}
