<?php
	require 'common.php';
	//Check if form is submitted
		$user=mysqli_real_escape_string($con,$_POST['user']);
		$message=mysqli_real_escape_string($con,$_POST['message']);
		//Set the time zone 
		date_default_timezone_set("America/New_York");
		$time=date("h:i:sa",time());
		//validate
		if(!isset($user) || $user==''|| !isset($message)|| $message==''){
			$error="Please fill in name and message";
			header('location:index.php?error='.urlencode($error));
		}else{
			$query="Insert into shouts(user,message,time)
					values('$user','$message','$time')";
			if(!mysqli_query($con,$query)){
				die('Error:'.mysqli_error($con));
			}else{
				header('location:index.php');
		}
	}
?>