
<?php
include_once 'header.php';

?>
            <div class="container">   
                <?php
                    include_once 'dbh-inc.php';

                    $Username=$_SESSION['u_uid'];

                    
                    $sql = "SELECT * FROM users WHERE user_uid='$Username'";
                    $result = mysqli_query ($conn,$sql) or die (mysqli_error ());
                    while ($row = mysqli_fetch_array ($result)){

                ?>
                <h2 class="dark-grey">Ο λογαριασμός μου</h2>
                <div class="jumbotron">
                    
                    <div class="row">
                        <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                            <img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
                        </div>
                        <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                        
                            <h3 class="dark-grey"  style="display:inline-block; padding-right:200px;">Στοχεία Ασφαλισμένου</h3>
                            <button type="submit"  name="edit" class="btn btn-secondary " >
                                <a href="edit-profile.php" style="color:white; decoration:none;">Επεξεργασία</a></button>
                            <div class="container" style="padding-top:10px; padding-bottom:0px;">
                                <label class="control-label"  for="first" style="font-size:20px; display:inline-block;")><strong>Όνομα:</strong></label>
                                <p style="font-size:18px; display:inline-block;"><?php echo $row ['user_first']; ?></p>
                            </div>
                            <div class="container" style="padding-top:0px; padding-bottom:0px;">
                                <label class="control-label"  for="first" style="font-size:20px; display:inline-block;")><strong>Επίθετο:</strong></label>
                                <p style="font-size:18px; display:inline-block;"><?php echo $row ['user_last']; ?></p>
                            </div>
                            <div class="container" style="padding-top:0px; padding-bottom:0px;">
                                <label class="control-label"  for="first" style="font-size:20px; display:inline-block;")><strong>ΑΜΚΑ:</strong></label>
                                <p style="font-size:18px; display:inline-block;"><?php echo $row ['user_amka']; ?></p>
                            </div>
                            <div class="container" style="padding-top:0px; padding-bottom:0px;">
                                <label class="control-label"  for="first" style="font-size:20px; display:inline-block;")><strong>ΑΦΜ:</strong></label>
                                <p style="font-size:18px; display:inline-block;"><?php echo $row ['user_afm']; ?></p>
                            </div>
                            <div class="container" style="padding-top:0px; padding-bottom:10px;">
                                <label class="control-label"  for="first" style="font-size:20px; display:inline-block;")><strong>Έμμεσα Εξαρτώμενα Μέλη:</strong></label>
                                <p style="font-size:18px; display:inline-block;"><?php echo $row ['user_emasf']; ?></p>
                            </div>
                            <h3 class="dark-grey">Στοχεία Λογαριασμού</h3>
                            <div class="container" style="padding-top:10px; padding-bottom:0px;">
                                <label class="control-label"  for="first" style="font-size:20px; display:inline-block;")><strong>Όνομα Χρήστη:</strong></label>
                                <p style="font-size:18px; display:inline-block;"><?php echo $row ['user_uid']; ?></p>
                            </div>
                            <div class="container" style="padding-top:0px; padding-bottom:0px;">
                                <label class="control-label"  for="first" style="font-size:20px; display:inline-block;")><strong>Κωδικός Χρήστη:</strong></label>
                                <p style="font-size:18px; display:inline-block;">********</p>
                            </div>
                            <div class="container" style="padding-top:0px; padding-bottom:0px;">
                                <label class="control-label"  for="first" style="font-size:20px; display:inline-block;")><strong>E-mail:</strong></label>
                                <p style="font-size:18px; display:inline-block;"><?php echo $row ['user_email']; ?></p>
                            </div>
                        </div>

                    </div>
                         
                </div>
                <?php
                }
                ?>
            </div>

            <?php
include_once 'footer.php';

?>


                