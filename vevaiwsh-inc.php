<?php  
 session_start();
 include_once 'dbh-inc.php'; 
 

 function fetch_data($conn){   
    $output = '';
    if(isset($_SESSION['u_uid'])){  //an  exei pragmatopoihthei login apo kapoio xristi pernw ta stoixeia tou xrhsth
            
        $Username=$_SESSION['u_uid'];
        $sql = "SELECT * FROM users WHERE user_uid='$Username'"; 
        $result = mysqli_query($conn, $sql);  
        while($row = mysqli_fetch_array($result))  
        {       
        $output .= '<tr>  
                          <td>'.$row["user_first"].'</td>  
                          <td>'.$row["user_last"].'</td>  
                          <td>'.$row["user_amka"].'</td> 
                          <td>'.$row["user_afm"].'</td> 
                                                    
                     </tr>  
                          ';  
        }  
    }
    else{
        $amka=mysqli_real_escape_string($conn, $_POST['amka']); 
        $sql = "SELECT * FROM non_users WHERE nonuser_amka='$amka'";
        $result = mysqli_query($conn, $sql);  
        while($row = mysqli_fetch_array($result))  
        {       
        $output .= '<tr>  
                          <td>'.$row["nonuser_first"].'</td>  
                          <td>'.$row["nonuser_last"].'</td>  
                          <td>'.$row["nonuser_amka"].'</td> 
                          <td>'.$row["nonuser_afm"].'</td> 
                                                    
                     </tr>  
                          ';  
        }          
    }
    
    return $output;  
 }  

    require_once('./tcpdf/tcpdf.php');  
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $obj_pdf->SetCreator(PDF_CREATOR);   
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $obj_pdf->SetDefaultMonospacedFont('arial');  
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $obj_pdf->setPrintHeader(false);  
    $obj_pdf->setPrintFooter(false);  
    $obj_pdf->SetAutoPageBreak(TRUE, 10);  
    $obj_pdf->SetFont('helvetica', '', 11);  
    $obj_pdf->AddPage();  
    $content = ''; 
      
      
    if(isset($_SESSION['u_type'])){          
        $typeOfuser=$_SESSION['u_type'];
        if($typeOfuser==1 && isset($_POST['ekdosi_synt'])){
          $content .= '  
              <h4 align="center">Vevaiwsh Syntaksewn (gia forologikh xrhsh)</h4><br /> 
              <table border="1" cellspacing="0" cellpadding="3">  
                   <tr>  
                        <th width="25%">ONOMA</th>  
                        <th width="25%">EPONYMO</th>  
                        <th width="25%">AMKA</th>  
                        <th width="25%">AFM</th>   
                   </tr>  
              '; 
        }
        else if($typeOfuser==0 && isset($_POST['ekdosi_apo'])){
          $content .= '  
              <h4 align="center">Vevaiwsh Apodoxwn (gia forologikh xrhsh)</h4><br /> 
              <table border="1" cellspacing="0" cellpadding="3">  
                    <tr>  
                        <th width="25%">ONOMA</th>  
                        <th width="25%">EPONYMO</th>  
                        <th width="25%">AMKA</th>  
                        <th width="25%">AFM</th>  
                   </tr>   
              '; 
        }
        else{
            echo "<script>
           alert('Η ενέργεια αυτή δεν ειναι συμβατή με τον τύπο ασφάλισης σας!');
           window.location.href='vevaiwsh.php?login=invalid'; 
            </script>";
            exit();
        }
                               
    }
    else{
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
        }else{
            $sql = "SELECT * FROM non_users WHERE nonuser_amka='$amka'";
            $result =mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck < 1){
                 echo "<script>
                   alert('Δεν έχει καταχωρηθεί ασφαλισμένος με αυτά τα στοιχεια.');
                   window.location.href=document.referrer;
                </script>";
                exit();
            }
        }
        $result=mysqli_query($conn, $sql);            
        $row = mysqli_fetch_array($result);
        $typeOfuser= $row["nonuser_type"];  

        if($typeOfuser==1 && isset($_POST['ekdosi_synt'])){
          $content .= '  
              <h4 align="center">Vevaiwsh Syntaksewn (gia forologikh xrhsh)</h4><br /> 
              <table border="1" cellspacing="0" cellpadding="3">  
                   <tr>  
                        <th width="25%">ONOMA</th>  
                        <th width="25%">EPONYMO</th>  
                        <th width="25%">AMKA</th>  
                        <th width="25%">AFM</th> 
                   </tr>  
              '; 
        }
        else if($typeOfuser==0 && isset($_POST['ekdosi_apo'])){
          $content .= '  
              <h4 align="center">Vevaiwsh Apodoxwn (gia forologikh xrhsh)</h4><br /> 
              <table border="1" cellspacing="0" cellpadding="3">  
                    <tr>  
                        <th width="25%">ONOMA</th>  
                        <th width="25%">EPONYMO</th>  
                        <th width="25%">AMKA</th>  
                        <th width="25%">AFM</th>
                   </tr>   
              '; 
        }
        else{
            echo "<script>
           alert('Η ενέργεια αυτή δεν ειναι συμβατή με τον τύπο ασφάλισης σας!');
           window.location.href='vevaiwsh.php?login=invalid'; 
            </script>";
            exit();
        
        }
    }

     
    $content .= fetch_data($conn);  
    $content .= '</table>';  
    $obj_pdf->writeHTML($content);  
    $obj_pdf->Output('file.pdf', 'I');
            
 
?>  
     