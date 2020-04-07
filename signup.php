<?php
include_once 'header.php';

?>

<div class="container-fluid">
    <section class="container" >
    	
    	
		<form class="form-horizontal " style="background-color: lightgrey;  padding: 20px;
    text-align: center; " action="signup-inc.php" method="POST" >
		 <div id="legend">
      		<h3 class="font-weight-bold" style="margin-bottom:30px" >Εγγραφή</h3>
   		 </div>

       <h4 class="dark-grey">Στοχεία Ασφαλισμένου</h4>
   		 <div class="control-group" >
      		<!-- Username -->
      		
          <p class="help-block">Παρακαλώ συμπληρώστε τα παρακάτω στοιχεία με λατινικούς χαρακτήρες</p>
      		<label class="control-label"  for="first"><strong>Όνομα</strong></label>

      		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>

      		<div class="controls">
      			
        		<input type="text" id="first"  name="first" placeholder=""  class="input" style=" height: 5%; margin:0 auto;">

      		</div>


    	</div>

    	<div class="control-group">
    		<label class="control-label"  for="last"><strong>Eπίθετο</strong></label>
    		<label class="label"   style="text-align: right; font-size:80%; color:red ">* </label>
      		<div class="controls">
        		<input type="text"  id="last"  name="last" placeholder=""  class="input" style=" height: 5%; margin:0 auto;">
        		
      		</div>
    	</div>

    	<div class="control-group">
    		<label class="control-label"  for="amka"><strong>A.M.K.A.</strong></label>
    		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
      		<div class="controls">
        		<input type="text" id="amka" name="amka" placeholder=""  class="input" style=" height: 5%; margin:0 auto;">
        		<p class="help-block">Παρακαλούμε εισάγεται το Α.M.K.A. (Αριθμός Μητρώου Κοινωνικής Ασφάλισης) χωρίς κενά μεταξύ των ψηφίων</p>
      		</div>
    	</div>

    	<div class="control-group">
    		<label class="control-label"  for="afm"><strong>A.Φ.Μ.</strong></label>
    		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
    		<div class="controls">
        		<input type="text" id="afm" name="afm" placeholder=""  class="input" style=" height: 5%; margin:0 auto;">
        		<p class="help-block">Παρακαλούμε εισάγεται το Α.Φ.Μ. (Αριθμός Φορολογικού Μητρώου) χωρίς κενά μεταξύ των ψηφίων</p>
      		</div>
    	</div>

    	<div class="control-group">
      		<label class="control-label"  for="pwd"><strong>Έμμεσα εξαρτώμενα μέλη ασφαλισμένου</strong></label>
  
      		<div class="controls">
        		<input type="text" id="em_asf" name="em_asf" placeholder=""  class="input" style=" height: 5%; margin:0 auto;">
        		<p class="help-block" style="margin-left:100px ;margin-right:100px; ">Παρακαλούμε συμπληρώστε μόνο με αριθμούς τον αριθμό των μελών της οικογένειάς σας που έιναι ασφαλισμένα απο εσάς. Προαιρετικό πεδίο.</p>
      		</div>
      	</div>


    	<hr style=" border-width: 2px;"/>
    	<div class="control-group">
    		<h4 class="dark-grey">Στοχεία Λογαριασμού</h4>
      		<label class="control-label"  for="uid"><strong>Όνομα χρήστη</strong></label>
      		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
      		<div class="controls">
        		<input type="text" id="uid" name="uid" placeholder=""  class="input" style=" height: 5%; margin:0 auto;">
        		
      		</div>
      	</div>

      	<div class="control-group">
      		<label class="control-label"  for="email"><strong>Διεύθυνση e-mail</strong></label>
      		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
      		<div class="controls">
        		<input type="text" id="email" name="email" placeholder=""  class="input" style=" height: 5%; margin:0 auto;">
        		
      		</div>
      	</div>

      	<div class="control-group">
      		<label class="control-label"  for="pwd"><strong>Κωδικός Πρόσβασης</strong></label>
      		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
      		<div class="controls">
        		<input type="password" id="pwd" name="pwd" placeholder=""  class="input" style=" height: 5%; margin:0 auto;">
        		<p class="help-block" style="margin-left:100px ;margin-right:100px; ">Παρακαλούμε συμπληρώστε με τουλάχιστον 8 χαρακτήρες που θα περιλαμβάνουν το λιγότερο εναν αριθμό, ένα μικρό γράμμα κάι ένα κεφαλαίο.</p>
      		</div>
      	</div>

      	<div class="control-group">
      		<label class="control-label"  for="pwd2"><strong>Επιβεβαίωση κωδικού πρόσβασης</strong></label>
      		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
      		<div class="controls">
        		<input type="password" id="pwd2" name="pwd2" placeholder=""  class="input" style=" height: 5%; margin:0 auto;">
        		
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
    
		
		<div class="control-group">
		<input type="checkbox" style="padding:0px" name="conditions" >Συμφωνώ με τους 
	  

	  	
			<a href="#" class="btn-link"  data-toggle="modal" data-target="#myModal">Όρους και πορϋποθέσεις</a>
		
			<p style="display: inline;">εγγραφής</p>

			<div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" >
			  <div class="modal-dialog modal-lg" >
			    <div class="modal-content" style="padding: 20px">
			      <p>Οι πληροφορίες που διακινούνται μέσω των ηλεκτρονικών υπηρεσιών του ΙΚΑ-ΕΤΑΜ προστατεύονται με κρυπτογράφηση σύμφωνα με τα σύγχρονα πρότυπα.</p>

					<p>  Για λόγους ασφαλούς λειτουργίας των Ηλεκτρονικών Συναλλαγών, το όνομα χρήστη και ο κωδικός χρήστης που υποβάλλονται στον ιστοχώρο του ΙΚΑ για κάθε χρήστη είναι μοναδικοί και προσωπικοί για αυτόν. Κάθε επιχείρηση που εγγράφεται στις Ηλεκτρονικές Υπηρεσίες είναι υπεύθυνη για τις Ηλεκτρονικές Συναλλαγές που πραγματοποιούνται με χρήση του κωδικού της και του συνθηματικού.</p>

					 <p> Σημειώνεται ότι το PIN μπορείτε να το αλλάζετε όποτε επιθυμείτε. Σε περίπτωση απώλειας του κωδικού χρήστη ή μη ηθελημένης γνωστοποίησης του σε τρίτους θα πρέπει να επικοινωνήσετε με την υπηρεσία παρακολούθησης ηλεκτρονικών υπηρεσιών, αποστέλλοντας μήνυμα μέσω της φόρμας "ΕΠΙΚΟΙΝΩΝΙΑ" του δικτυακού τόπου www.ika.gr.</p>
			    </div>
			  </div>
			</div>

		</div>

		<div class="control-group" style="padding:15px">

		<button type="submit" name="submit" class="btn btn-secondary " >Eγγραφή</button>

		</div>
				
			 
      	</fieldset>
		</form>

<?php
include_once 'footer.php';

?>

  </section>


</div>
</body>



</html>    