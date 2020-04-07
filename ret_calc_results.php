<?php
include_once 'header.php';

?>
<!--breadcrumb-->
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="index.php">Αρχική</a></li>
  <li class="breadcrumb-item"><a href="index.php">Eργαζόμενος</a></li>
    <li class="breadcrumb-item"><a href="index.php">Υπολογισμός σύνταξης</a></li>

  <li class="breadcrumb-item active">Αποτελέσματα υπολογισμού ποσού</li>

</ol>

<div class="container-fluid">
    <section class="container" style="width:55%;" >
    	<?php
    	if( isset($_SESSION['retirement'])){
    		$ret=$_SESSION['retirement'];
    	
    	?>

    	<div class="modal-dialog modal-lg" >
			    <div class="modal-content" style="padding: 20px">
			      <p>Το αποτέλεσμα του υπολογισμού ποσού σύνταξης για αυτά τα στοιχεία είναι : </p>

					<p><?php echo $ret; ?> </p>
			    </div>
			  </div>

	<?php } 
	else{
		echo "error";}?>


   </section>

   


 </div>   	

<div class="container" style="height: 200px;"></div>
  

  <?php 
include_once 'footer.php';

?>

</body>
</html>