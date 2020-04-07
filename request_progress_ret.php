<?php
include_once 'header.php';

include_once 'dbh-inc.php';



if(isset($_SESSION['u_uid'])){


$uid=$_SESSION['u_uid'];

$sql="SELECT user_id FROM users WHERE user_uid='$uid'";
$result= mysqli_query($conn, $sql)or die (mysqli_error ());

$result_check=mysqli_fetch_row($result);
$progress_uid=$result_check[0];


$sql="SELECT req_status FROM requests WHERE requests.req_type=1 AND requests.req_uid='$progress_uid'";
$result= mysqli_query ($conn,$sql) or die (mysqli_error ());

$result_check=mysqli_fetch_row($result);
$status=$result_check[0];

$sql = "SELECT * FROM users WHERE user_id='$progress_uid'";
$result = mysqli_query ($conn,$sql) or die (mysqli_error ());
$user_data=mysqli_fetch_row($result);
$id=$user_data[0];
$first=$user_data[1];
$last=$user_data[2];
$amka=$user_data[3];
$afm=$user_data[4];


}
else{
  if(isset($_SESSION['nonu_amka'])){
    $amka=$_SESSION['nonu_amka'];

    $sql="SELECT nonuser_id FROM non_users WHERE nonuser_amka='$amka'";
    $result= mysqli_query($conn, $sql)or die (mysqli_error ());

    $result_check=mysqli_fetch_row($result);
    $progress_non_uid=$result_check[0];

    $sql="SELECT req_status FROM nonuser_requests WHERE nonuser_requests.req_type=1 AND nonuser_requests.req_uid='$progress_non_uid'";
    $result= mysqli_query ($conn,$sql) or die (mysqli_error ());

    $result_check=mysqli_fetch_row($result);
    $status=$result_check[0];

    $sql = "SELECT * FROM non_users WHERE nonuser_id='$progress_non_uid'";
    $result = mysqli_query ($conn,$sql) or die (mysqli_error ());
    $user_data=mysqli_fetch_row($result);
    $id=$user_data[0];
    $first=$user_data[1];
    $last=$user_data[2];
    $amka=$user_data[3];
    $afm=$user_data[4];


  }
  else{
    echo"Something went wrong";
    exit();
  }

}

?>

<!--breadcrumb-->
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="index.php">Αρχική</a></li>
  <li class="breadcrumb-item"><a href="index.php">Eργαζόμενος</a></li>
  <li class="breadcrumb-item"><a href="index.php">Φόρμα αίτησης</a></li>
  <li class="breadcrumb-item active">Εξέλιξη αιτήματος συνταξιοδότησης συνταξιοδότησης</li>

</ol>

    <section class="col-xs-4 col-xs-offset-4" style=" width:85%; ">
      
      
    <form class= class="form-horizontal " style="background-color: lightgrey; display: inline-block; padding: 50px;
    text-align: center; "  >
     <div id="legend">
          <h4 class="font-weight-bold" style="margin-bottom:30px" >Εξέλιξη αιτήματος συνταξιοδότησης</h4>
      </div>

      <div class="control-group" >

      	<?php
      
      		if($status==0){

      		echo '
      		<p style="font-size: 20px">Η αίτηση συνταξιοδότησης βρίσκεται <strong>σε εξέλιξη</strong>!</p>
      		<div class="progress">
			  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
			</div>

			';
      		}elseif($status==1){
      			echo '
      		<p style="font-size: 20px">H αίτηση συνταξιοδότησης έιναι <strong>ολοκληρωμένη</strong>!</p>
      		<div class="progress">
			  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
			';

      		}
      		else{
      			echo "Something went wrong";
      			exit(); //debug
      		}

      	?>

    	<h4>Στοιχεία αιτούντος/ούσας</h4>
    	
      	<p style="text-align: left"><strong>Όνομα</strong> : <?php echo $first; ?></p>

      	<p  style="text-align: left"><strong>Επίθετο</strong> : <?php echo $last; ?></p>

      	<p  style="text-align: left"><strong>Α.Μ.Κ.Α (Αριθμός Μητρώου Κοινωνικής Ασφάλισης)</strong> : <?php echo $amka; ?></p>

      	<p  style="text-align: left"><strong>Α.Φ.Μ. (Αριθμός Φορολογικού Μητρώου)</strong> : <?php echo $afm; ?></p>

    </div>
      
       </fieldset>
    </form>
    

  </section>


<?php
include_once 'footer.php';

?>


</body>
</html>