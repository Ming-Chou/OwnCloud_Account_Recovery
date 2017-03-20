<?php
	$email = $_POST['email'];
	$con = mysql_connect("127.0.0.1", "AccountID", "Password");
    mysql_select_db("owncloud", $con);
	$query = "SELECT userid  FROM  oc_preferences WHERE  configkey='email' AND  configvalue='" . $email . "'";
	$result = mysql_query($query, $con) or die ('Error in query');
	if (mysql_num_rows($result)){
		$row = mysql_fetch_row($result);
		$to="$email";
		$subject="NTTU CSIE owncloud 忘記帳號";
		$message="您的帳號為：" . $row[0];
		mail($to,$subject,$message);
		header("Location:http://drive.csie.nttu.edu.tw/true.php"); 
		exit;
	}
	else {
		header("Location:http://drive.csie.nttu.edu.tw/false.php"); 
		exit;
	}
?>
