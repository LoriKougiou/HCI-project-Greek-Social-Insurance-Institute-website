<?php
include_once 'header.php';
  

?>
<html>
<!--breadcrumb-->
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="index.php">Αρχική</a></li>
  <li class="breadcrumb-item active">Επικοινωνία</li>
</ol>

<!--Epikoinwnia-->

<div class="container" id="epikoinwnia" style="width:100%; display:block;">
    <p><strong style="font-size:24px;">Επικοινωνείστε μαζί μας!</strong></p>
    <a href="./pdfs/tilefwnikos.pdf" class="btn btn-outline-info" target="_blank">Τηλεφωνικός Κατάλογος ></a>
    
    <div class="container">
        <p><strong style="font-size:24px;">Παρακαλώ συμπληρώστε τη παρακάτω φόρμα:</strong></p>
        <label><b>Όνομα Χρήστη</b></label>
        <input type="text" placeholder="Εισάγετε όνομα" name="uname" required>
        
        <label><b>E-mail</b></label>
        <input type="text" placeholder="Εισάγετε email" name="psw" required>
        
        <label><b>Τηλέφωνο</b></label>
        <input type="text" placeholder="Εισάγετε τηλέφωνο" name="psw" required>
        
        <label><b>Παρακαλώ γράψτε μας το μήνυμα σας</b></label>
        <textarea class="form-control" rows="5" id="message" placeholder="Τι σας απασχολεί; Περιγράψτε μας."></textarea>
     </div>
    
    <div class="container" style="background-color:#f1f1f1">
      <input type="button" class="btn btn-secondary " value="Αποστολή">
      <button type="button" onclick="closeConfirm('epikoinwnia')" class="btn btn-secondary ">Cancel</button>
    </div>
</div>



<?php
include_once 'footer.php';

?>

  </body>
      
   <!--JavaScript Functions-->
    <!-- FUNCTIONS FOR ALERT WINDOWS-->
	<script>
    function closeConfirm(id) {
        var x=document.getElementById(id);
        if (confirm("Η διαδικασία δεν ολοκληρώθηκε. Είστε σίγουρος ότι θέλετε να φύγετε από τη σελίδα;") == true) {
          
            window.location.href=document.referrer; 
        } 
    }
    </script>
    
     <!-- FUNCTIONS FOR CLOSING MODAL BOXES-->
    <!--code for closing the modal box by clicking anywhere out of the modal box-->

</html>