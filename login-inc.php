<?php
session_start();

if(isset($_POST['submit'])){
	include_once 'dbh-inc.php';
	$uid=mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd=mysqli_real_escape_string($conn, $_POST['pwd']);

	if(empty($uid) ||empty($pwd))  {
			   echo "<script>
               alert('Παρακαλούμε συμπληρώστε όλα τα πεδία της φόρμας!');
               window.location.href='login.php?login=failure'; 
            </script>";

		exit();
	}else{
		$sql="SELECT * FROM users WHERE user_uid='$uid'";
		$result =mysqli_query($conn,$sql);
	    $resultCheck = mysqli_num_rows($result);
	    if($resultCheck < 1){
			echo "<script>
               alert('Δεν υπάρχει χρήστης με αυτά τα στοιχεία.');
               window.location.href='login.php?login=failure'; 
            </script>";
		}else{
			if($row= mysqli_fetch_assoc($result)){
				//dehashing the password
				$hashedPwdCheck =password_verify($pwd, $row['user_pwd']);
				if($hashedPwdCheck == false){
					echo "<script>
               alert('Δεν υπάρχει χρήστης με αυτά τα στοιχεία.');
               window.location.href='login.php?login=failure'; 
            </script>";
				}
				elseif ($hashedPwdCheck == true){
					//login the user
					$_SESSION['u_id']=$row['user_id'];
					$_SESSION['u_first']=$row['user_first'];
					$_SESSION['u_last']=$row['user_last'];
					$_SESSION['u_email']=$row['user_email'];
					$_SESSION['u_uid']=$row['user_uid'];
					$_SESSION['u_afm']=$row['user_afm'];
					$_SESSION['u_amka']=$row['user_amka'];
					$_SESSION['u_emasf']=$row['user_emasf'];
					$_SESSION['u_type']=$row['user_type'];
					

					header("Location: index.php?login=success");
					exit();
				}


			}
		}

	}

}else{
	header("Location: index.php?");
	exit();
}


?>