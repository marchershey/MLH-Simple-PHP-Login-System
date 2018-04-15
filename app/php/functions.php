<?php

# Site-wide functions

function securePage(){
	if(!isset($_SESSION['user'])){
		redirect("login.php?secured");
	}
}

# Alert function
function alert($message, $type = "primary", $class = ""){
	if($type=="primary" || $type=="blue" || empty($type)){
		echo "<div class=\"alert alert-primary text-center $class\" role=\"alert\">".$message."</div>";
	}elseif($type=="secondary"){
		echo "<div class=\"alert alert-secondary text-center $class\" role=\"alert\">".$message."</div>";
	}elseif($type=="success" || $type=="green" || $type=="good"){
		echo "<div class=\"alert alert-success text-center $class\" role=\"alert\">".$message."</div>";
	}elseif($type=="danger" || $type=="red" || $type=="error"){
		echo "<div class=\"alert alert-danger text-center $class\" role=\"alert\">".$message."</div>";
	}elseif($type=="warning" || $type=="yellow"){
		echo "<div class=\"alert alert-warning text-center $class\" role=\"alert\">".$message."</div>";
	}elseif($type=="info" || $type=="lightblue"){
		echo "<div class=\"alert alert-info text-center $class\" role=\"alert\">".$message."</div>";
	}elseif($type=="light"){
		echo "<div class=\"alert alert-light text-center $class\" role=\"alert\">".$message."</div>";
	}elseif($type=="dark"){
		echo "<div class=\"alert alert-dark text-center $class\" role=\"alert\">".$message."</div>";
	}else{
		echo "<div class=\"alert alert-primary text-center $class\" role=\"alert\">".$message."</div>";
	}
}

# Global alert function
function globalAlert(){
	global $global;
	if($global['global_alert']['enabled']){
		if(!empty($global['global_alert']['content'])){
			alert($global['global_alert']['content'], $global['global_alert']['type'], $global['global_alert']['class']);
		}else{
			alert("error", "Content is not set in Global Alert.");
		}
	}
}

# Redirect function with time delay option
function redirect($location, $time = 0){
	global $global;
	if($time != 0){
		header("refresh:".$time.";url=".$global['site']['url']."/".$location);
	}else{
		header("Location: ".$global['site']['url']."/".$location);
	}
}

# Sanitize function
function sanitize($string) {
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

# Console Function
function console($data) {
	if(is_array($data)){
		$data = implode(',', $data);
	}
	echo "<script>console.log('".$data."');</script>";
}
