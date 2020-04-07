<?php
include_once 'header.php';

?>


<div class="container-fluid">
    <section class="container" style="width:55%;" >
    	
    	
		<form class="form-horizontal " style=" background-color: lightgrey;  padding: 20px;
    text-align: center;"  action="ret_calc-inc.php" method="POST">
		 <div id="legend">
      		<h3 class="font-weight-bold" style="margin-bottom:30px" >Υπολογισμός ποσού σύνταξης</h3>
   		 </div>

      <h4>Συμπληρώστε τα παρακάτω στοιχεία για την τελευταία δεκαετία.</h4>
      <div class="container">
      </div>


       <div class="control-group" >
        <div class="btn-group">
  
           <select name="synt_for" class="btn  btn-light">

          <option class="dropdown-item" id="b1" value="" href="#">Συνταξιοδοτικός φορέας</option>
          <option class="dropdown-item" id="b1"  value="1" href="#">ΙΚΑ-ΕΤΑΜ</option>
          <option class="dropdown-item" id="b2" vlaue="1" href="#">ΕΤΕΑΜ</option>
       
        </select>


      </div>
      </div>


      <div class="container">
      </div>

      


       <div class="control-group" >
        <div class="btn-group">
     
          <select name="type_synt" class="btn  btn-light">

          <option class="dropdown-item" id="b1" value="" href="#">Τύπος σύνταξης</option>
          <option class="dropdown-item" id="b1"  value="1" href="#">ΓΗΡΑΤΟΣ</option>
          <option class="dropdown-item" id="b2" vlaue="1" href="#">ΑΝΑΠΗΡΙΑΣ</option>
          <option class="dropdown-item" id="b3" value="1" href="#">ΘΑΝΑΤΟΥ ΑΣΦΑΛΙΣΜΕΝΟΥ</option>
          <option class="dropdown-item" id="b4"  value="1" href="#">ΘΑΝΑΤΟΥ ΣΥΝΤΑΞΙΟΥΧΟΥ</option>
        </select>
     
    </div>

    </div>

  

    <div class="container">
      </div>


    <table class="table table-bordered">
  <thead>
    <tr>
      
      <th style="width:10%">Έτος</th>
      <th style="width:20%">Αποδοχές</th>
      <th style="width:20%">Ημέρες εργασίας</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">2017</th>
     
      <td><input type="text" name="sal[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
      <td><input type="text" name="days[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
    </tr>
    <tr>
      <th scope="row">2016</th>
      
      <td><input type="text" name="sal[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
      <td><input type="text" name="days[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
    </tr>
    <tr>
      <th scope="row">2015</th>
      
      <td><input type="text" name="sal[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
      <td><input type="text" name="days[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
    </tr>
    <tr>

      
      <th scope="row">2014</th>
     
      <td><input type="text" name="sal[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
      <td><input type="text" name="days[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
    <tr>
      <th scope="row">2013</th>
      <td><input type="text" name="sal[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
      <td><input type="text" name="days[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
    </tr>
    <tr>
      <th scope="row">2012</th>
     
      <td><input type="text"  name="sal[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
      <td><input type="text" name="days[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
    </tr>
    <tr>
      <th scope="row">2011</th>
      
      <td><input type="text" name="sal[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
      <td><input type="text" name="days[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
    <tr>
      <th scope="row">2010</th>
     
      <td><input type="text" name="sal[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
      <td><input type="text" name="days[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
    </tr>
    <tr>
      <th scope="row">2009</th>
      
      <td><input type="text" name="sal[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
      <td><input type="text" name="days[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
    </tr>
    <tr>
      <th scope="row">2008</th>
     
      <td><input type="text" name="sal[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
      <td><input type="text" name="days[]" class="text input-sm" style="width:100px" required="" oninvalid="this.setCustomValidity('Παρακαλώ συμπληρώστε αυτό το πεδίο')"
 oninput="setCustomValidity('')"></input> </td>
    </tr>




  </tbody>
</table>
     

   	

		<div class="control-group" style="padding:15px">

		<button type="submit" name="submit" class="btn btn-secondary " >Υποβολή</button>

		</div>
				
			 
      	</fieldset>
		</form>

	</section>
</div>
</body>



</html>    