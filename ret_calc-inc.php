<?php
session_start();

if(isset($_POST['submit'])){

	echo "mphkaa";

	$sum_sal=0;
	$sum_days=0;
	if( empty($_POST['type_synt']) || empty($_POST['synt_for']) ){
		echo "<script>
               alert('Παρακαλώ επιλέξτε συνταξιοδοτικό φορέα και τύπο σύνταξης.');
               window.location.href=document.referrer; 
            </script>";
            exit();

	}


	foreach ($_POST['sal'] as $salary) {

		if($salary){

			if(ctype_digit($salary )==FALSE){
				echo "<script>
               alert('Παρακαλώ εισάγετε μόνο ψηφία.');
               window.location.href=document.referrer; 
            </script>";
            exit();
			
			} 
			else{
				$sum_sal=$sum_sal+$salary;
			}

		}
	    
	}

	foreach ($_POST['days'] as $days) {

		if($days){

			if(ctype_digit($days )==FALSE){
				echo "<script>
               alert('Παρακαλώ εισάγετε μόνο ψηφία.');
               window.location.href=document.referrer; 
            </script>";
            exit();
			
			} 
			else{
				$sum_days=$sum_days+$days;
			}
		}
	    
	}

	$retirement= ( $sum_sal *$sum_days)/30000;

	$_SESSION['retirement']=$retirement;
	header("Location: ret_calc_results.php?");
	exit();
	 

}
else{
	header("Location: index.php?");
	exit();
}


?>