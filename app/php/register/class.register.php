<?php

# PHP class for Register
class Register extends Database{

  public function execute($user, $pass, $ip){
    # Call $global variable for encryption_options
    global $global;
    # Encrypt the password
    $pass = password_hash($pass, PASSWORD_BCRYPT, $global['config']['encryption_options']);
    # Check if username exists
    if(!$this->usernameExists($user)){
      # The username does not exist, continue
      # Insert data into the database
      if($this->query("INSERT INTO users (username, password, registration_timestamp, registration_ip) VALUES (?,?,?,?)", [$user, $pass, time(), $ip])) {
        # Successfully inserted the data into the database.
        return true;
      }else{
        # The data was rejected, show error
        return "Your information was rejected. Try again.";
      }
    }else{
      # The username exists, show error
      return "Someone is already using that username."; # found
    }
  }

  # Function to check if the username exists
  private function usernameExists($user){
    if($this->fetchRow("SELECT * FROM users WHERE username = ?", [$user])){
      return true; # username exists
    }else{
      return false; # username does not exist
    }
  }
}
