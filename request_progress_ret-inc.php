<?php
session_start();

include_once 'dbh-inc.php';

if(isset($_SESSION['u_uid'])){

	$uid=$_SESSION['u_uid'];

	$sql="SELECT user_id FROM users WHERE user_uid='$uid'";
	$result= mysqli_query($conn, $sql);
	if (!$result) {
	    echo "Could not run query: ";
	    exit();
	}

	$result_check=mysqli_fetch_row($result);
	$progress_uid=$result_check[0];

	

	$sql="SELECT COUNT(*) FROM requests WHERE requests.req_type=1 AND requests.req_uid='$progress_uid'";
	$result= mysqli_query($conn, $sql);
	if (!$result) {
	    echo "Could not run query: ";
	    exit();
	}
	$result_check=mysqli_fetch_row($result);
	$numberOfret_requests=$result_check[0];
	if($numberOfret_requests==0){

	 	echo "<script>
	          alert('Δεν εχει υποβληθεί αίτηση συνταξιοδότησης για αυτόν τον λογαριασμό ασφάλισης.');
	           window.location.href=document.referrer;   
	       </script>";
	   
	    exit();
	}
	elseif($numberOfret_requests>1 || $numberOfret_requests<0){
		echo "Something went wrong";//debug
		exit();
	}
	else{

		header("Location: request_progress_ret.php");
		exit();




	}
}
else{


        $first=mysqli_real_escape_string($conn, $_POST['first']);
        $last=mysqli_real_escape_string($conn, $_POST['last']);
        $amka=mysqli_real_escape_string($conn, $_POST['amka']); 
        $afm=mysqli_real_escape_string($conn, $_POST['afm']);

        $_SESSION['nonu_amka']=$amka;

        
        if(empty($first) ||empty($last) ||empty($amka) ||empty($afm))  {
            echo "<script>
               alert('Παρακαλούμε συμπληρώστε όλα τα απαιτούμενα πεδία!');
               window.location.href=document.referrer; 
            </script>";
			exit();
			
        }

        $sql = "SELECT * FROM non_users WHERE nonuser_amka='$amka' AND  nonuser_first='$first' AND nonuser_last='$last' AND nonuser_afm='$afm' ";
        $result =mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){

        	
             echo "<script>
               alert('Δεν έχει καταχωρηθεί ασφαλισμένος με αυτά τα στοιχεια.');
               window.location.href=document.referrer;
            </script>";
            exit();
            
        }
       

        $resultCheck =mysqli_fetch_row($result); 
        $typeOfuser=$resultCheck[5]; 

        if($typeOfuser==1){
         	echo "<script>
               alert('Το αίτημα σας δεν είναι συμβατό με τον τύπο ασφάλισης σας.');
               window.location.href=document.referrer;
            </script>";
            exit();

            
        }

        $result=mysqli_query($conn, $sql);            
        $row = mysqli_fetch_array($result);
        $nonu_id= $row["nonuser_id"];


		$sql="SELECT COUNT(*) FROM nonuser_requests WHERE nonuser_requests.req_type=1 AND nonuser_requests.req_uid='$nonu_id'";
		$result= mysqli_query($conn, $sql);
		if (!$result) {
		    echo "Could not run query: ";
		    exit();
		}
		$result_check=mysqli_fetch_row($result);
		$numberOfret_requests=$result_check[0];
		if($numberOfret_requests==0){

		 	echo "<script>
		          alert('Δεν εχει υποβληθεί αίτηση συνταξιοδότησης για αυτόν τον λογαριασμό ασφάλισης.');
		           window.location.href=document.referrer;   
		       </script>";
		   
		    exit();
		}
		elseif($numberOfret_requests>1 || $numberOfret_requests<0){
			echo "Something went wrong";//debug
			exit();
		}
		else{

			header("Location: request_progress_ret.php");
			exit();

		}

		exit();


}

