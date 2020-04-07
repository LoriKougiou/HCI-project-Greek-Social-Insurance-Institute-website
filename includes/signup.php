<?php

if(isset($_PSOT['submit'])){
		include_once './dbh.php';
		
		$first=myspli_real_escape_string($conn, $_POST['first']);
		$last=myspli_real_escape_string($conn, $_POST['last']);
		$email=myspli_real_escape_string($conn, $_POST['email']);
		$uid=myspli_real_escape_string($conn, $_POST['uid']);
		$pwd=myspli_real_escape_string($conn, $_POST['pwd']);
		
		//error handlers
		//check for empty fields
		
		if(empty($first) || empty($last) || empty($email) ||empty($uid) ||empty($pwd))  {
			
			exit();	
		}else{
			//check if input chars are valid
			if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) ){
				header("Location: ./index.php?signup=invalid");
				exit();
			}else{
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					header("Location: ./index.php?signup=email");
					exit();
				}else{
					$sql="SELECT * FROM users WHERE user_uid='$uid'";
					$result= mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					
					if($result>0){
						header("Location: ./index.php?signup=usertaken");
						exit();
					}else{
						//hashing the pwd
						$hashedPwd=	password_hash($pwd, PASSWORD_DEFAULT);
						//insert he user into th db
						$sql="INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first','$last', 
						'$email', '$uid', '$hashedPwd'  );";
						
						mysqli_query($conn, $sql);
						header("Location: ./index.php?signup=success");
						
						
						
						
						
						
						
						
						
					}
							
				}
			}
		}
	
	
}else{

	exit();
}

php?>