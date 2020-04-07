<?php
include_once 'header.php';

?>


<!--breadcrumb-->
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="index.php">Αρχική</a></li>
  <li class="breadcrumb-item"><a href="index.php">Eργαζόμενος</a></li>
  <li class="breadcrumb-item active">Αίτηση συνταξιοδότησης</li>

</ol>


<div class="container-fluid">
    <section class="container" >
      
     
         <?php        //an  exei pragmatopoihthei login apo kapoio xristi pernw ta stoixeia tou xrhsth
        if(isset($_SESSION['u_uid'])){ ?> 
          <form class="form-horizontal " style="background-color: lightgrey; padding: 20px;
                            text-align: center; " action="request-inc.php" method="POST" >
     <div id="legend">
          <h3 class="font-weight-bold" style="margin-bottom:30px" >Στοιχεία ασφαλισμένου για αίτηση συνταξιοδότησης</h3>
       </div>

       <div class="control-group" >
          <label class="control-label"  for="first"><strong>Όνομα</strong></label>

          <label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
          <div class="controls">            
            <input type="text" id="first"  name="first" disabled="disabled" placeholder="<?php echo $_SESSION['u_first']; ?> " id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
          </div>
      </div>

      <div class="control-group">
        <label class="control-label"  for="last"><strong>Eπίθετο</strong></label>
        <label class="label"   style="text-align: right; font-size:80%; color:red ">* </label>
          <div class="controls">
            <input type="text"  id="last"  name="last" disabled="disabled" placeholder="<?php echo $_SESSION['u_last']; ?> " id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
          </div>
      </div>

      <div class="control-group">
        <label class="control-label"  for="amka"><strong>A.M.K.A.</strong></label>
        <label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
          <div class="controls">
            <input type="text" id="amka" name="amka" disabled="disabled" placeholder="<?php echo $_SESSION['u_amka']; ?> " id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
            <p class="help-block">Παρακαλούμε εισάγεται το Α.M.K.A. (Αριθμός Μητρώου Κοινωνικής Ασφάλισης) χωρίς κενά μεταξύ των ψηφίων</p>
          </div>
      </div>

      <div class="control-group">
        <label class="control-label"  for="afm"><strong>A.Φ.Μ.</strong></label>
        <label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
        <div class="controls">
            <input type="text" id="afm" name="afm" disabled="disabled" placeholder="<?php echo $_SESSION['u_afm']; ?> " id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
            <p class="help-block">Παρακαλούμε εισάγεται το Α.Φ.Μ. (Αριθμός Φορολογικού Μητρώου) χωρίς κενά μεταξύ των ψηφίων</p>
          </div>
      </div>
        <?php } 
        //an den exei pragmatopoihthei login apo kapoio xristi, emfanizw kena text inputs
        else{ ?> 
            <form class="form-horizontal " style="background-color: lightgrey;  padding: 20px;
                                text-align: center; " action="request-inc.php" method="POST" >
             <div id="legend">
                <h3 class="font-weight-bold" style="margin-bottom:30px" >Στοιχεία ασφαλισμένου για αίτηση συνταξιοδότησης</h3>
             </div>

             <div class="control-group" >
                <label class="control-label"  for="first"><strong>Όνομα</strong></label>

                <label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
                <div class="controls">            
                    <input type="text" id="first"  name="first" placeholder="" id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"  for="last"><strong>Eπίθετο</strong></label>
                <label class="label"   style="text-align: right; font-size:80%; color:red ">* </label>
                <div class="controls">
                    <input type="text"  id="last"  name="last" placeholder="" id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"  for="amka"><strong>A.M.K.A.</strong></label>
                <label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
                <div class="controls">
                    <input type="text" id="amka" name="amka" placeholder="" id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
                    <p class="help-block">Παρακαλούμε εισάγεται το Α.M.K.A. (Αριθμός Μητρώου Κοινωνικής Ασφάλισης) χωρίς κενά μεταξύ των ψηφίων</p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"  for="afm"><strong>A.Φ.Μ.</strong></label>
                <label class="label"   style="text-align: right; font-size:80%; color:red ">*</label>
                <div class="controls">
                    <input type="text" id="afm" name="afm" placeholder="" id="" value=""  class="input" style=" height: 5%; margin:0 auto;">
                    <p class="help-block">Παρακαλούμε εισάγεται το Α.Φ.Μ. (Αριθμός Φορολογικού Μητρώου) χωρίς κενά μεταξύ των ψηφίων</p>
                </div>
            </div>
          
        <?php } ?>

  
      <hr style=" border-width: 2px;"/>



    <div class="control-group">
    <p class="dark-grey" style="color:red; font-size:80%; margin-top: 30px">Τα πεδία με * είναι υποχρεωτικά.</p>
    </div>

    <hr style=" border-width: 2px;"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        

        <div class="control-group" style="padding:15px">
           <button type="submit" name="submit" class="btn btn-secondary " >Υποβολή</button>

        </div>

   
     </fieldset>
      </form>

  </section>


<?php
include_once 'footer.php';

?>
  
</div>
</body>



</html>    