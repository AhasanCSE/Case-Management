<?php
session_start();
include('config/db_connection.php');
$mgs = "";
if(isset($_POST['submit'])){  

	$currentTime = date('Y-m-d H:s:i');
	$user = trim($_POST['username']);
	$pass = trim($_POST['password']);
	$md5pass = md5($pass);
	
	function removeSqlInjection($varaibleGiven)
	{
	    $operators="'=','or'";
	    //echo $operators."<br/>";
	    $replacer='';
	    $operatorArray=explode(",","$operators");
	    $counts=count($operatorArray);
	    
	    for($i=0;$i<$counts;$i++)
	    {

	       $varaibleGiven=str_replace($operatorArray[$i],$replacer,$varaibleGiven); 
	        
	    }
	    
	    return $varaibleGiven;
	}
	
//	$user=str_replace("=",'',$user);
//	$pass=str_replace("=",'',$pass);
	
	$user=removeSqlInjection($user);
	$pass=removeSqlInjection($pass);
	$sql = "SELECT * FROM `users` WHERE EMAIL = '$user' AND `PASSWORD` = '$pass'";
	//echo $sql;
	$result = mysqli_query($con,$sql);
	$data = mysqli_fetch_assoc($result);
	if(!empty($data)){
		$_SESSION['user'] = $data;
		$date= date('Y-m-d H:i:s');
		$_SESSION['login_time'] = $date;
			
		header('Location: soft/index.php');
		exit;
	}else{
		
		$mgs="Your Username or Password is not valid!";
	}
}
?>