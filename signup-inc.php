<?php
session_start();
if(isset($_POST['submit'])){

	include_once 'dbh-inc.php';

	$first=mysqli_real_escape_string($conn, $_POST['first']);
	$last=mysqli_real_escape_string($conn, $_POST['last']);
	$email=mysqli_real_escape_string($conn, $_POST['email']);
	$uid=mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd=mysqli_real_escape_string($conn, $_POST['pwd']);
	$pwd2=mysqli_real_escape_string($conn, $_POST['pwd2']);
	$afm=mysqli_real_escape_string($conn, $_POST['afm']);
	$amka=mysqli_real_escape_string($conn, $_POST['amka']);
	$em_asf=mysqli_real_escape_string($conn, $_POST['em_asf']);




	if(empty($first) || empty($last) || empty($email) ||empty($uid) ||empty($pwd) || empty($afm) || empty($amka) ){
        
        echo "<script>
               alert('Παρακαλούμε συμπληρώστε όλα τα πεδία της φόρμας!');
               window.location.href='signup.php?signup=empty'; 
            </script>";

		exit();
	}
	else{

		if(!isset($_POST['radio'])) {
		
            echo "<script>
               alert('Δεν έχετε συμπληρώσει τύπο ασφάλισης.Παρακαλώ εισάγετε πάλι!');
               window.location.href='signup.php?signup=failure'; 
            </script>";
            exit();
		}

		if($pwd!=$pwd2){
			echo "<script>
                   alert('Οι κωδικοί πρόσβασης δεν ταιριάζουν.Παρακαλώ εισάγετε πάλι!');
                   window.location.href='signup.php?signup=failure'; 
                </script>";
				exit();
		}

		if(!preg_match("/^[a-zA-Zα-ζΑ-Ζ]*$/", $first) || !preg_match("/^[a-zA-Zα-ζΑ-Ζ]*$/", $last) ){
			
            echo "<script>
               alert('Μη αποδεκτός τύπος ονόματος.Παρακαλώ εισάγετε πάλι!');
               window.location.href='signup.php?signup=failure'; 
            </script>";
			exit();
		}
			

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			
            echo "<script>
               alert('Μη αποδεκτή διεύθυνση e-mail.Παρακαλώ εισάγετε πάλι!');
               window.location.href='signup.php?signup=failure'; 
            </script>";
            exit();
            

		}
			
		if(strlen($afm)!=9 || ctype_digit($afm )==FALSE || ctype_graph( $afm )==FALSE) { //na einai 9 xarakthres, mono pshfia xwris kena

			echo "<script>
               alert('Το Α.Φ.Μ. δεν είναι έγκυρο. Παρακαλώ εισάγετε πάλι!');
               window.location.href='signup.php?signup=failure'; 
            </script>";
            exit();


		}
					

		if (strlen($amka)!=11 || ctype_digit($amka )==FALSE || ctype_graph( $amka )==FALSE) {//na einai 11 xarakthres, mono pshfia xwris kena
		echo "<script>
           alert('Το Α.M.K.A. δεν είναι έγκυρο. Παρακαλώ εισάγετε πάλι!');
           window.location.href='signup.php?signup=failure'; 
        </script>";
        exit();
		}


		$sql="SELECT * FROM users WHERE user_uid='$uid'";
		$result= mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		
		if($resultCheck>0){
		
            echo "<script>
               alert('Το όνομα χρήστη που επιλέξατε χρησιμοποιείται ήδη.Παρακαλώ εισάγετε πάλι!');
               window.location.href='signup.php?signup=failure'; 
            </script>";
            exit();
		}


		/* AMKA, AFM UNIQUE */
		$sql="SELECT * FROM users WHERE user_amka='$amka'";
		$result= mysqli_query($conn, $sql);
		$resultCheck1 = mysqli_num_rows($result);
		

		$sql="SELECT * FROM users WHERE user_afm='$afm'";
		$result= mysqli_query($conn, $sql);
		$resultCheck2 = mysqli_num_rows($result);
		
		if($resultCheck1>0 || $resultCheck1>0){
		
            echo "<script>
               alert('Υπάρχει ήδη εγγεγραμμένος χρήστης με αυτά τα στοιχεία.Παρακαλώ εισάγετε πάλι!');
               window.location.href='signup.php?signup=failure'; 
            </script>";
            exit();
		}
						
		// Password must be strong
		if(!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $pwd) ){
			echo "<script>
       		alert('Ο κωδικός πρόσβασης δεν είναι αρκετά δυνατός.Παρακαλώ εισάγετε πάλι!');
       		window.location.href='signup.php?signup=failure'; 
    		</script>";
    		
   		 exit();

		}

		if(empty($em_asf)){
			$em_asf=0;
			
		}
		else{
			if(ctype_digit($em_asf)==FALSE || strlen($em_asf)>2 ){ //mexri 2pshfio noumero
				echo "<script>
               alert('Ο αριθμός των έμμεσα ασφαλισμένων μελών δεν είναι έγκυρος.Παρακαλώ εισάγετε πάλι!');
               window.location.href='signup.php?signup=failure'; 
	            </script>";
	            exit();
			}
		}

			$answer= $_POST['radio'];  
		if ($answer == "ergaz") {          
		   //vale type ergazomeno 
			$type=0;
			
			
		}
		elseif($answer =="synt"){
		    //Bale type syntaksiouxo
		    $type=1;
		   


		}      
		else{
        	echo "Something wrong happened"; //debug 

        	exit();
		}

		if(!isset($_POST['conditions'])){
			echo "<script>
          alert('Αν δεν συμφωνείτε με τους όρους και τις προϋποθέσεις, η εγγραφή δεν θα ολοκληρωθεί.');
          window.location.href='index.php?signup=failure'; 
        </script>";
        exit();
		}
								
		//hashing the pwd
		$hashedPwd=	password_hash($pwd, PASSWORD_DEFAULT);
		//insert he user into th db


		$sql="INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, user_afm, user_amka, user_emasf, user_type) VALUES ('$first','$last', 
		'$email', '$uid', '$hashedPwd', '$afm', '$amka', $em_asf, $type);";
		
		mysqli_query($conn, $sql);

		$_SESSION['u_first']=$first;
		$_SESSION['u_last']=$last;
		$_SESSION['u_email']=$email;
		$_SESSION['u_uid']=$uid;
		$_SESSION['u_afm']=$afm;
		$_SESSION['u_amka']=$amka;
		$_SESSION['u_emasf']=$em_asf;
		$_SESSION['u_type']=$type;



		echo "<script>
          alert('Η εγγραφή σας ολοκληρώθηκε επιτυχώς!');
          window.location.href='index.php?signup=success'; 
        </script>";
        
		exit();

		
	}

}

else{
	header("Location: signup.php?signup");
	exit();
}

?>