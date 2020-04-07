<?php
include_once 'header.php';
  

?>

<!--breadcrumb-->
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="index.php">Αρχική</a></li>
 
  <li class="breadcrumb-item active">Βεβαιώσεις</li>

</ol>


 <html>  
      <head>  
           <title>Vevaiwsh</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br />
           <div class="container">  
                <h3><strong>Ηλεκτρονική Έκδοση Βεβαιώσεων</strong></h3><br />
                <p class="dark-grey" style="color:red; font-size:14px; margin-top: 5px">* Για δική σας διευκόλυνση, 
                πραγματοποιείστε είσοδο με τον λογαριασμό σας, έτσι ώστε τα στοιχεία σας να συμπληρωθούν αυτομάτως για την βεβαίωση.</p>
                
                <h4><strong>1. Βεβαίωση Συντάξεων (για φορολογική χρήση)</strong></h4>
                <p>Μέσω της υπηρεσίας αυτής, έχετε τη δυνατότητα πληκτρολογώντας τα απαιτούμενα ασφαλιστικά σας στοιχεία να εκδώσετε
                    τη «Βεβαίωση Συντάξεων Για Φορολογική Χρήση». Η υπηρεσία αυτή απευθύνεται σε όλες τις κατηγορίες των συνταξιούχων των κάτωθι
                    φορέων που εντάχθηκαν στον ΕΦΚΑ: ΙΚΑ-ΕΤΑΜ, ΕΤΕΑ(τ. ΕΤΕΑΜ), ΤΑΠ-ΟΤΕ, ΤΑΠΙΛΤ, ΤΣΠ-ΑΤΕ, ΤΑΠ-ΕΤΒΑ, ΤΥΔΚΥ, ΤΣΑΥ και ΤΑΠ-ΔΕΗ.</p>
                <!--<div class="table-responsive">  -->
                	<div class="col-md-12" align="right">
                     <form method="post" action="synt_form.php">
                        <button type="submit"  name="vevaiwsh_synt" class="btn btn-secondary " >
                          <a href="synt_form.php" style="color:white; decoration:none;">Έκδοση</a></button>
                         
                                                                            
                     </form>  
                     </div>
                     <br/>
                     <br/>
                <h4><strong>2. Βεβαίωση Αποδοχών (για φορολογική χρήση)</strong></h4>
                <p>Μέσω της υπηρεσίας αυτής, έχετε τη δυνατότητα πληκτρολογώντας τα απαιτούμενα ασφαλιστικά σας στοιχεία να εκδώσετε
                    τη «Βεβαίωση Αποδοχών Για Φορολογική Χρήση». Η υπηρεσία αυτή απευθύνεται σε όλες τις κατηγορίες των ασφαλισμένων εργαζομένων 
                    και ευλεύθερων επαγγελματιών που εντάσσονται στον ΟΑΕΕ. Η κατάσταση των αποδοχών-εισφορών συμπληρώνεται από τον εργοδότη 
                    κατα την πληρωμή κάθε μήνα. Πλεόν,είναι δυνατή η έκδοση της βεβαίωσης αυτής και ηλεκτρονικά.</p>
                <!--<div class="table-responsive">  -->
                	<div class="col-md-12" align="right">
                    <form method="post" action="apo_form.php"> 
                      <button type="submit"  name="vevaiwsh_apo" class="btn btn-secondary " >
                      <a href="apo_form.php" style=" color:white; decoration:none;">Έκδοση</a></button>
                         
                                                    
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <!--
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">Id</th>  
                               <th width="30%">Name</th>  
                               <th width="15%">Age</th>  
                               <th width="50%">Email</th>  
                          </tr>    
                     </table>  -->
               <!-- </div>  -->
           </div> 








           <div class="container" style="height: 80px;"></div>



</section>

<?php
include_once 'footer.php';

?> 
      </body>  
</html>  