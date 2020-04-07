<?php
include_once 'header.php';

?>
<!--breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Αρχική</a></li>
  <li class="breadcrumb-item"><a href="show-profile.php">Ο λογαριασμός μου</a></li>
  <li class="breadcrumb-item active">Επεξεργασία λογαριασμού</li>
</ol>



<div class="container-fluid">
    <section class="container" >
        <?php
            include_once 'dbh-inc.php';

            $Username=$_SESSION['u_uid'];

            
            $sql = "SELECT * FROM users WHERE user_uid='$Username'";
            $result = mysqli_query ($conn,$sql) or die (mysqli_error ());
            while ($row = mysqli_fetch_array ($result)){

        ?>
    	
    	
		<form class="form-horizontal " style="background-color: lightgrey; display: inline-block; padding: 20px;
                            text-align: center; " action="edit-profile-inc.php" method="POST" >
		 <div id="legend">
      		<h3 class="font-weight-bold" style="margin-bottom:30px" >Επεξεργασία Ατομικού Λογαριασμού</h3>
   		 </div>

   		 <div class="control-group" >
      		<!-- Username -->
      		<h5 class="dark-grey">Στοχεία Ασφαλισμένου</h5>
      		<label class="control-label"  for="first"><strong>Όνομα</strong></label>

      		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>

      		<div class="controls">
      			
        		<input type="text" id="first"  name="first" placeholder="<?php echo $row ['user_first']; ?> " id="" value=""  class="input" style=" height: 5%; margin:0 auto;">

      		</div>


    	</div>

    	<div class="control-group">
    		<label class="control-label"  for="last"><strong>Eπίθετο</strong></label>
    		<label class="label"   style="text-align: right; font-size:80%; color:red ">* </label>
      		<div class="controls">
        		<input type="text"  id="last"  name="last" placeholder="<?php echo $row ['user_last']; ?> " id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
        		
      		</div>
    	</div>

    	<div class="control-group">
    		<label class="control-label"  for="amka"><strong>A.M.K.A.</strong></label>
    		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
      		<div class="controls">
        		<input type="text" id="amka" name="amka" placeholder="<?php echo $row ['user_amka']; ?> " id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
        		<p class="help-block">Παρακαλούμε εισάγεται το Α.M.K.A. (Αριθμός Μητρώου Κοινωνικής Ασφάλισης) χωρίς κενά μεταξύ των ψηφίων</p>
      		</div>
    	</div>

    	<div class="control-group">
    		<label class="control-label"  for="afm"><strong>A.Φ.Μ.</strong></label>
    		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
    		<div class="controls">
        		<input type="text" id="afm" name="afm" placeholder="<?php echo $row ['user_afm']; ?> " id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
        		<p class="help-block">Παρακαλούμε εισάγεται το Α.Φ.Μ. (Αριθμός Φορολογικού Μητρώου) χωρίς κενά μεταξύ των ψηφίων</p>
      		</div>
    	</div>

    	<div class="control-group">
      		<label class="control-label"  for="pwd"><strong>Έμμεσα εξαρτώμενα μέλη ασφαλισμένου</strong></label>
  
      		<div class="controls">
        		<input type="text" id="em_asf" name="em_asf" placeholder="<?php echo $row ['user_emasf']; ?> " id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
        		<p class="help-block" style="margin-left:100px ;margin-right:100px; ">Παρακαλούμε συμπληρώστε μόνο με αριθμούς τον αριθμό των μελών της οικογένειάς σας που έιναι ασφαλισμένα απο εσάς. Προαιρετικό πεδίο.</p>
      		</div>
      	</div>


    	<hr style=" border-width: 2px;"/>
    	<div class="control-group">
    		<h4 class="dark-grey">Στοχεία Λογαριασμού</h4>
      		<label class="control-label"  for="uid"><strong>Όνομα χρήστη</strong></label>
      		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
      		<div class="controls">
        		<input type="text" id="uid" name="uid" placeholder="<?php echo $row ['user_uid']; ?> " id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
        		
      		</div>
      	</div>

      	<div class="control-group">
      		<label class="control-label"  for="email"><strong>Διεύθυνση e-mail</strong></label>
      		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
      		<div class="controls">
        		<input type="text" id="email" name="email" placeholder="<?php echo $row ['user_email']; ?> " id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
        		
      		</div>
      	</div>

      	<div class="control-group">
      		<label class="control-label"  for="pwd"><strong>Κωδικός Πρόσβασης</strong></label>
      		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
      		<div class="controls">
        		<input type="password" id="pwd" name="pwd" placeholder="********" id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
        		<p class="help-block" style="margin-left:100px ;margin-right:100px; ">Παρακαλούμε συμπληρώστε με τουλάχιστον 8 χαρακτήρες που θα περιλαμβάνουν το λιγότερο εναν αριθμό, ένα μικρό γράμμα κάι ένα κεφαλαίο.</p>
      		</div>
      	</div>


      	<hr style=" border-width: 2px;"/>
      	<h4 class="dark-grey">Τύπος Ασφαλισμένου</h4>
      	<label class="control-label"  for="radio"><strong>Κατηγορία που ανήκετε</strong></label>
      	<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
      	<!--<label class="label" style=" font-size:80%; color:red ">*</label>

      	<div class="control-group">
		<div class="btn-group btn-group-toggle" data-toggle="buttons" name="radio" id="radio">
		  <label class="btn btn-outline-secondary ">
		    <input type="radio" name="ergaz" id="ergaz" autocomplete="off" checked> Εργαζόμενος
		  </label>
		  <label class="btn btn-outline-secondary">
		    <input type="radio" name="synt" id="synt" autocomplete="off"> Συνταξιούχος
		  </label>
		 </div>
		</div>
		-->
		<div class="control-group">
		
		  Εργαζόμενος <input type="radio" name="radio" value="ergaz" /><br />
		  Συνταξιούχος <input type="radio" name="radio" value="synt"  /><br />
		  
		</div>


		

		<div class="control-group">
		<p class="dark-grey" style="color:red; font-size:80%; margin-top: 30px">Τα πεδία με * είναι υποχρεωτικά.</p>
		</div>

		<hr style=" border-width: 2px;"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        

        <div class="control-group" style="padding:15px">

        <button type="submit" name="submit" class="btn btn-secondary " >Αποθήκευση Αλλαγών</button>

        </div>
            
         
    </fieldset>
    </form>
    <?php
        }
        ?>

	</section>


<?php
include_once 'footer.php';

?>



</div>
</body>



</html>    