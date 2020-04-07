<?php
include_once 'header.php';

?>



<div class="container-fluid">
    <section class="container" >
    	
    	
		
		<form class="form-horizontal " style="background-color: lightgrey;  padding: 20px;
    text-align: center; " action="login-inc.php" method="POST" >
						
			 <div id="legend">
      		<h3 class="font-weight-bold" style="margin-bottom:30px" >Είσοδος</h3>
   		 </div>

			<div class="control-group">
    		
      		<label class="control-label"  for="uid"><strong>Όνομα χρήστη</strong></label>
      		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
      		<div class="controls">
        		<input type="text" id="uid" name="uid" placeholder=""  class="input" style=" height: 5%; margin:0 auto;">
        		
      		</div>
      	</div>	

      	<div class="control-group">
      		<label class="control-label"  for="pwd"><strong>Κωδικός Πρόσβασης</strong></label>
      		<label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
      		<div class="controls">
        		<input type="password" id="pwd" name="pwd" placeholder=""  class="input" style=" height: 5%; margin:0 auto;">
        		
      		</div>
      	</div>	

      	<div class="control-group" style="padding:15px">

		<button type="submit" name="submit" class="btn btn-secondary " >Είσοδος</button>

		</div>		

		<div class="control-group" style="padding:15px">

		<div class="row">	
		<label style="margin-top: 5px">Δεν είστε εγγεγραμμένο μέλος;</label>
		
		<a href="signup.php"  class="btn btn-link">Εγγραφή</a>
		</div>

		</div>	
				
				
	

	</section>

<div class="container" style="height: 110px;"></div>

<?php
include_once 'footer.php';

?>
</div>
</body>



</html>    