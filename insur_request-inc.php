<?php
session_start();
include_once 'dbh-inc.php';
if(isset($_POST['submit'])){

  $sum1=0; //arxikopoihseis
  $sum2=0;

  $ins_first=mysqli_real_escape_string($conn, $_POST['ins_first']);
  $ins_last=mysqli_real_escape_string($conn, $_POST['ins_last']);
  $ins_amka=mysqli_real_escape_string($conn, $_POST['ins_amka']);

  //validation gia ta stoixeia tou emmesa asfalismenou
  if(empty($ins_first) ||empty($ins_last) ||empty($ins_amka))   {
            echo "<script>
               alert('Παρακαλούμε συμπληρώστε όλα τα απαιτούμενα πεδία!');
               window.location.href=document.referrer; 
            </script>";
      exit();
      
  }

  if(!preg_match("/^[a-zA-Z]*$/", $ins_first) || !preg_match("/^[a-zA-Z]*$/", $ins_last) ){
      
            echo "<script>
               alert('Μη αποδεκτός τύπος ονόματος.Παρακαλώ εισάγετε πάλι!');
               window.location.href=document.referrer;  
            </script>";
      exit();
  }

  if (strlen($ins_amka)!=11 || ctype_digit($ins_amka )==FALSE || ctype_graph( $ins_amka )==FALSE) {//na einai 11 xarakthres, mono pshfia xwris kena
    echo "<script>
           alert('Το Α.M.K.A. δεν είναι έγκυρο. Παρακαλώ εισάγετε πάλι!');
           window.location.href=document.referrer; 
        </script>";
        exit();
  }

  if(isset($_SESSION['u_uid'])){
    
    $uid=$_SESSION['u_uid']; //apo to session to user name

    $sql="SELECT user_id FROM users WHERE user_uid='$uid'";
    $result= mysqli_query($conn, $sql);
    if (!$result) {
        echo "Could not run query: ";
        exit();
    }

    $result_check=mysqli_fetch_row($result);
    $r_uid=$result_check[0];


    $sql="SELECT COUNT(*) FROM requests WHERE requests.req_type=0 AND requests.req_uid='$r_uid' AND requests.req_ins_amka='$ins_amka'";
    $result= mysqli_query($conn, $sql);
    if (!$result) {
        echo "Could not run query: ";
        exit();
    }

    $result_check=mysqli_fetch_row($result);
    $sum1=$result_check[0];

    //psakse an exei kanei aithsh xwris na einai sundedemenos
    //psakse an einai katagegrammenos stoys nonusers
   
    $user_amka=$_SESSION['u_amka'];
    $sql="SELECT COUNT(*) FROM non_users WHERE nonuser_amka ='$user_amka'";
    $result= mysqli_query($conn, $sql);
    if (!$result) {
        echo "Could not run query: ";
        exit();
    }
    $result_check=mysqli_fetch_row($result);
    $exist_in_nonusers=$result_check[0];

    //an uparxei stous non users psakse an exei kanei aithsh gia auto to amka ksana
   

    if($exist_in_nonusers==1){

      $sql="SELECT COUNT(*) FROM nonuser_requests WHERE nonuser_requests.req_type=0 AND nonuser_requests.req_ins_amka='$ins_amka'";
      $result1= mysqli_query($conn, $sql);
      if (!$result1) {
          echo "Could not run query: ";
          exit();
      }

      $result_check1=mysqli_fetch_row($result1);
      $sum2=$result_check1[0];

      $numberOfins_requests=$sum1+$sum2;

    }
    
    if($sum1==1 || $sum2==1){

      echo "<script>
              alert('Έχετε ήδη υποβάλλει αίτηση ασφάλισης για αυτά τα στοιχεία.');
              window.location.href='index.php?request_ret=failure'; 
            </script>";
        exit();
        
    }
    elseif($numberOfins_requests<0 || $numberOfins_requests>2){
      echo "Something went wrong1"; //debug
      exit();
    }
    else{
      $r_type=0;

      $sql="SELECT status FROM random_data ORDER BY RAND() LIMIT 1;";
      $result= mysqli_query($conn, $sql);
      if (!$result) {
          echo "Could not run query: ";
          exit();
      }
      $result_check=mysqli_fetch_row($result);
      $r_status=$result_check[0];


      //an uparxei stous non_users enhmerwse ta request tou kai ekei
      if($exist_in_nonusers==1){

        $sql="SELECT nonuser_id FROM non_users WHERE nonuser_amka='$user_amka'; ";
        mysqli_query($conn, $sql);
       
      
        $result=mysqli_query($conn, $sql);
        if (!$result) {
          echo "Could not run query: ";
          exit();
        }
        $result_check=mysqli_fetch_row($result);
        $nonuser_id=$result_check[0];


        $sql="INSERT INTO nonuser_requests (req_type, req_status, req_uid , req_ins_amka) VALUES ('$r_type','$r_status', 
        '$nonuser_id', '$ins_amka');";
        $result=mysqli_query($conn, $sql);
        if (!$result) {
          echo "Could not run query: ";
          exit();
        }
            
      }   

      $sql="INSERT INTO requests (req_type, req_status, req_uid , req_ins_amka) VALUES ('$r_type','$r_status', 
          '$r_uid', '$ins_amka');";
          
      mysqli_query($conn, $sql);

      // if($r_status==1){

      $sql="SELECT user_emasf FROM users WHERE user_id='$r_uid'; ";
      $result= mysqli_query($conn, $sql);
      if (!$result) {
          echo "Could not run query: ";
          exit();
      }
      $result_check=mysqli_fetch_row($result);
      $curr_emasf=$result_check[0];
      $new_emasf=$curr_emasf+1;

    
      $sql="UPDATE users SET user_emasf='$new_emasf' WHERE user_id = '$r_uid';";
       $result= mysqli_query($conn, $sql); 

      if($exist_in_nonusers==1){
      //enhmerwse ta emmesa asfalismena melh kai tou non user
        $sql="UPDATE non_users SET nonuser_emasf='$new_emasf' WHERE nonuser_id = '$nonuser_id';";

         $result= mysqli_query($conn, $sql); 
      }

      //}

      echo "<script>
              alert('Το αίτημα σας καταχωρήθηκε επιτυχώς!');
              window.location.href='index.php?request_ret=success'; 
           </script>";
      exit();
    }
  
  }
  else{ //o xrhsths den einai loged in


      $first=mysqli_real_escape_string($conn, $_POST['first']);
      $last=mysqli_real_escape_string($conn, $_POST['last']);
      $amka=mysqli_real_escape_string($conn, $_POST['amka']); 
      $afm=mysqli_real_escape_string($conn, $_POST['afm']);
      
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

                  
      
      $nonu_id= $resultCheck[0]; 

      //an mporei na kanei thn aithsh eksetase an uparxei stous users

      $sql="SELECT COUNT(*) FROM users WHERE user_amka ='$amka'";
      $result= mysqli_query($conn, $sql);
      if (!$result) {
          echo "Could not run query: ";
          exit();
      }
      $result_check=mysqli_fetch_row($result);
      $exist_in_nonusers=$result_check[0];


    //eksetase an uparxei aithsh stous non users gia to amka auto 

    $sql="SELECT COUNT(*) FROM nonuser_requests WHERE nonuser_requests.req_type=0 AND nonuser_requests.req_uid='$nonu_id' AND nonuser_requests.req_ins_amka='$ins_amka'";
    $result= mysqli_query($conn, $sql);
    if (!$result) {
        echo "Could not run query: ";
        exit();
    }

    $result_check=mysqli_fetch_row($result);
    $sum1=$result_check[0];


    //an uparxei stous users eksetase an uparxei edw aithsh gia to amka auto
    if($exist_in_nonusers==1){
        $sql="SELECT COUNT(*) FROM requests WHERE requests.req_type=0 AND requests.req_ins_amka='$ins_amka'";
        $result1= mysqli_query($conn, $sql);
        if (!$result1) {
            echo "Could not run query: ";
            exit();
        }

        $result_check1=mysqli_fetch_row($result1);
        $sum2=$result_check1[0];
    
    }

    $numberOfins_requests=$sum1+$sum2;

    if($sum1==1 || $sum2==1){

      echo "<script>
              alert('Έχετε ήδη υποβάλλει αίτηση ασφάλισης για αυτά τα στοιχεία.');
              window.location.href=document.referrer; 
            </script>";
        exit();
        
    }
    elseif($numberOfins_requests>2 || $numberOfins_requests<0  ){
      echo "Something went wrong2"; //debug
      exit();
    }
    else{
      $r_type=0;

      $sql="SELECT status FROM random_data ORDER BY RAND() LIMIT 1;";
      $result= mysqli_query($conn, $sql);
      if (!$result) {
          echo "Could not run query: ";
          exit();
      }
      $result_check=mysqli_fetch_row($result);
      $r_status=$result_check[0];

      $sql="INSERT INTO nonuser_requests (req_type, req_status, req_uid, req_ins_amka) VALUES ('$r_type','$r_status', 
          '$nonu_id', '$ins_amka');";
          
      mysqli_query($conn, $sql);

      //an uparxei stous users enhmerwse ta request tou kai ekei
      if($exist_in_nonusers==1){

        $sql="SELECT user_id FROM users WHERE user_amka='$amka'; "; //vres to id tou ston pinaka twn users
      
        $result=mysqli_query($conn, $sql);
        if (!$result) {
          echo "Could not run query: ";
          exit();
        }
        $result_check=mysqli_fetch_row($result);
        $user_id=$result_check[0];


        $sql="INSERT INTO requests (req_type, req_status, req_uid , req_ins_amka) VALUES ('$r_type','$r_status', 
        '$user_id', '$ins_amka');";
        $result=mysqli_query($conn, $sql);
        if (!$result) {
          echo "Could not run query: ";
          exit();
        }

        //pare tis plhrofories apo to account tou afou uparxei(isws na exei apo prin asfalismena melh wste na enhmerwthei swsta h non_usesrs)
        $sql="SELECT user_emasf FROM users WHERE user_id='$user_id'; ";
        $result= mysqli_query($conn, $sql);
        if (!$result) {
            echo "Could not run query: ";
            exit();
        }
        $result_check=mysqli_fetch_row($result);
        $curr_emasf=$result_check[0];
        $new_emasf=$curr_emasf+1;

        //enhmerwse to account tou stous users
        $sql="UPDATE users SET user_emasf='$new_emasf' WHERE user_id = '$user_id';"; 
       mysqli_query($conn, $sql); 
       if (!$result) {
            echo "Could not run query: ";
            exit();
        }

        //enhmerwse to row tou stous non_users
        $sql="UPDATE non_users SET nonuser_emasf='$new_emasf' WHERE nonuser_id = '$nonu_id';"; 
        mysqli_query($conn, $sql);
        if (!$result) {
            echo "Could not run query: ";
            exit();
        } 

             
      }
      else{

        // if($r_status==1){

        $sql="SELECT nonuser_emasf FROM non_users WHERE nonuser_id='$nonu_id'; ";
        $result= mysqli_query($conn, $sql);
        if (!$result) {
            echo "Could not run query: ";
            exit();
        }
        $result_check=mysqli_fetch_row($result);
        $curr_emasf=$result_check[0];
        $new_emasf=$curr_emasf+1;

        $sql="UPDATE non_users SET nonuser_emasf='$new_emasf' WHERE nonuser_id = '$nonu_id';"; 
       mysqli_query($conn, $sql); 

        //}

      }

      echo "<script>
              alert('Το αίτημα σας καταχωρήθηκε επιτυχώς!');
              window.location.href='index.php?request_ins=success'; 
           </script>";
           exit();       

    }

  }
  

}
  
else{
    header("Location: insur_request.php?request");
    exit();
}




?>