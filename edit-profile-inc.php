<?php
    session_start();
    if(isset($_POST['submit'])){
      
            include_once 'dbh-inc.php';

            $first=mysqli_real_escape_string($conn, $_POST['first']);
            $last=mysqli_real_escape_string($conn, $_POST['last']);
            $email=mysqli_real_escape_string($conn, $_POST['email']);
            $uid=mysqli_real_escape_string($conn, $_POST['uid']);
            $pwd=mysqli_real_escape_string($conn, $_POST['pwd']);
            $afm=mysqli_real_escape_string($conn, $_POST['afm']);
            $amka=mysqli_real_escape_string($conn, $_POST['amka']);
            $em_asf=mysqli_real_escape_string($conn, $_POST['em_asf']);
            
            
            

            $id = $_SESSION['u_id'];
            $changes=0;
            if(empty($first) && empty($last) && empty($email) && empty($uid) && empty($pwd) && empty($afm) && empty($amka) && empty($em_asf) && (!isset($_POST['radio'])) )  {
                
               echo "<script>
                       confirm('Δεν έχετε κάνει καμία αλλαγή στα δεδομένα του προφίλ σας.Θέλετε να προχωρήσετε;');
                       window.location.href='edit-profile.php?edit-profile=none'; 
                    </script>";
               
                exit();
            }
            else{
                
                if(!empty($first)){
                    if(!preg_match("/^[a-zA-Zα-ζΑ-Ζ]*$/", $first)){
                        echo "<script>
                           alert('Μη αποδεκτός τύπος ονόματος.Παρακαλώ εισάγετε πάλι!');
                           window.location.href='edit-profile.php?edit-profile=invalid'; 
                            `</script>";
                        exit();
                    }
                    else{
                        $sql="UPDATE users SET user_first='$first' WHERE user_id = $id;";                
                        mysqli_query($conn, $sql);
                        $changes++;
                        
                    }
                }
                if(!empty($last)){
                    if(!preg_match("/^[a-zA-Zα-ζΑ-Ζ]*$/", $last)){
                        echo "<script>
                           alert('Μη αποδεκτός τύπος επιθέτου.Παρακαλώ εισάγετε πάλι!');
                           window.location.href='edit-profile.php?edit-profile=invalid'; 
                            `</script>";
                        exit();
                    }
                    else{
                        $sql="UPDATE users SET user_last='$last' WHERE user_id = '$id';";                
                        mysqli_query($conn, $sql);
                        $changes++;
                        
                    }
                }
                if(!empty($afm)){
                    if(strlen($afm)!=9 || ctype_digit($afm )==FALSE || ctype_graph( $afm )==FALSE) { //na einai 9 xarakthres, mono pshfia xwris kena

                        echo "<script>
                           alert('Το Α.Φ.Μ. δεν είναι έγκυρο. Παρακαλώ εισάγετε πάλι!');
                           window.location.href='signup.php?signup=failure'; 
                        </script>";
                        exit();

                    }else{
                        $sql="UPDATE users SET user_afm=$afm WHERE user_id = $id;";                
                        mysqli_query($conn, $sql);
                        $changes++;
                    }
                }
                if(!empty($amka)){
                    if (strlen($amka)!=11 || ctype_digit($amka )==FALSE || ctype_graph( $amka )==FALSE) {//na einai 11 xarakthres, mono pshfia xwris kena
                        echo "<script>
                           alert('Το Α.M.K.A. δεν είναι έγκυρο. Παρακαλώ εισάγετε πάλι!');
                           window.location.href='signup.php?signup=failure'; 
                        </script>";
                        exit();
                    }
                    else{
                        $sql="UPDATE users SET user_amka=$amka WHERE user_id = $id;";                
                        mysqli_query($conn, $sql);
                        $changes++;
                    }
                }
                if(!empty($pwd)){
                    // Password must be strong
                    if(!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $pwd) ){
                        echo "<script>
                        alert('Ο κωδικός πρόσβασης δεν είναι αρκετά δυνατός.Παρακαλώ εισάγετε πάλι!');
                        window.location.href='signup.php?signup=failure'; 
                        </script>";
                        
                     exit();
                    }
                    else{
                        //hashing the pwd
                        $hashedPwd=	password_hash($pwd, PASSWORD_DEFAULT);
                        $sql="UPDATE users SET user_pwd=$hashedPwd WHERE user_id = $id;";                
                        mysqli_query($conn, $sql);
                        $changes++;
                    }
                }           

                if(!empty($em_asf)){
                    if(ctype_digit($em_asf)==FALSE || strlen($em_asf)>2 ){ //mexri 2pshfio noumero
                        echo "<script>
                       alert('Ο αριθμός των έμμεσα ασφαλισμένων μελών δεν είναι έγκυρος.Παρακαλώ εισάγετε πάλι!');
                       window.location.href='signup.php?signup=failure'; 
                        </script>";
                        exit();
                    }
                    else{
                        $sql="UPDATE users SET user_emasf='$em_asf' WHERE user_id = $id;";                
                        mysqli_query($conn, $sql);
                        $changes++;
                    }
                    
                }
               
                if(!empty($email)){
                    if((!filter_var($email, FILTER_VALIDATE_EMAIL))&&(!empty($email))){
                    
                        echo "<script>
                           alert('Μη αποδεκτή διεύθυνση e-mail.Παρακαλώ εισάγετε πάλι!');
                           window.location.href='edit-profile.php?edit-profile=email'; 
                        </script>";
                        exit();       
                    }
                    else{
                        $sql="UPDATE users SET user_email='$email' WHERE user_id = '$id';";                
                        mysqli_query($conn, $sql);
                        $changes++;
                    }
                
                }
                
                if(!(empty($uid))){
                    $sql="SELECT * FROM users WHERE user_uid='$uid';";
                    $result= mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if($resultCheck>0){
                    
                        echo "<script>
                           alert('Το όνομα χρήστη που επιλέξατε χρησιμοποιείται ήδη.Παρακαλώ εισάγετε πάλι!');
                           window.location.href='edit-profile.php?edit-profile=usertaken'; 
                        </script>";
                        exit();
                    }
                    else{
                        $sql="UPDATE users SET user_uid='$uid' WHERE user_id = '$id';";                
                        mysqli_query($conn, $sql);
                        $changes++;
                    }               
                    
                }
                if(isset($_POST['radio'])) {
                    $answer= $_POST['radio'];  
                    if ($answer=="ergaz") {          
                       //vale type ergazomeno 
                        $type=0;
                        $sql="UPDATE users SET user_type=$type WHERE user_id = '$id';";                
                        mysqli_query($conn, $sql);
                        $changes++;                        
                    }
                    elseif($answer =="synt"){
                        //Bale type syntaksiouxo
                        $type=1;
                        $sql="UPDATE users SET user_type=$type WHERE user_id = '$id';";                
                        mysqli_query($conn, $sql);
                        $changes++; 
                    }      
                    else{
                        echo "Something wrong happened"; //debug 
                        exit();
                    }                    
                    
                }
                if($changes>0){
                    echo "<script>
                   alert('Η αποθήκευση αλλαγών στο προφίλ σας ολοκληρώθηκε επιτυχώς!'); 
                    </script>";
					$_SESSION['u_first']=$first;
					$_SESSION['u_last']=$last;
					$_SESSION['u_email']=$email;
					$_SESSION['u_uid']=$uid;
                    $_SESSION['u_afm']=$afm;
                    $_SESSION['u_amka']=$amka;
                    $_SESSION['u_type']=$type;
                    $_SESSION['u_emasf']=$em_asf;
                    header('Location: '. $_SERVER['HTTP_REFERER'] . '');
                    exit();
                   
                }   

                    
            }        
            
           
              
    }
    else{
        header("Location: ?edit-profile=nooot");
        exit();
    }

?>