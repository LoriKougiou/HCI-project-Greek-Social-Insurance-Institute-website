
<?php
  session_start();
 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="./font-awesome.min.css">

   <!-- Optional JavaScript -->
   <!-- Gia thn navigation bar-->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>



    <title>Index</title>

  </head>

  <body>

  <header>


      <!--Nav-bar-->
  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript">
    $(window).resize(function(){
      if ($(window).width() > 480) {
        $("ul").removeAttr('style');
      };
    });
    $("nav div").click(function(){
      $("ul").slideToggle();
      $("ul ul").css("display", "none");
      
      
      
    });
    $("ul li").click(function(){
      $("ul ul").slideUp();
      
      
      $(this).find('ul').slideToggle();
    });
    
    
  </script>

 <nav class=" navbar navbar-expand-xl navbar-dark " id="navbarSupportedContent" style=" background-color: #2a034f;">
  
    <ul class="navbar-nav mr-auto" style="position: absolute; z-index: 10">
    

  
    <a href="./index.php" class="w3-bar-item w3-button w3-theme-l1 ">
   <img src="./images/IKA-ETAM_logo.png" alt="IKA-LOGO" style="w3-color:green;width:70px;height:50px;margin-right: 30px;">
  </a>
     
      
      
      
      <li class="nav-item dropdown"  style="margin-right: 30px;  font-family: Verdana, Geneva, sans-serif;">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" data-hover="dropdown" aria-haspopup="true" aria-expanded="false">Υπηρεσίες </a>
       <ul>
          <h6 class="dropdown-header">Προς</h6>
            
          <li><a hrf="#" class="btn" data-toggle="collapse" data-target="#demo" style="color:white "><span class="glyphicon glyphicon-chevron-down"></span>Εργαζόμενους</a>
                    <div id="demo" class="collapse">
                    <ul>
                    
                 
                      <li> <a class="text-white" href="apo_form.php" style="font-size: 14px" >Λήψη Βεβαίωσης Αποδοχών</a> </li>
                        



                        <li> <a class="btn" data-toggle="collapse" data-target="#demo1" style="color:white; "><span class="glyphicon glyphicon-chevron-down"></span>Συνταξιοδότηση</a> 
                        <div id="demo1" class="collapse">
                        <ul>
                          
                             <li> <a class=" btn btn-link"  href="request.php" style="font-size: 14px; color:white" >Αίτηση Συνταξιοδότησης</a> </li>
                      
    
                              <li> <a class=" btn btn-link" href="ret_progress_form.php" style="font-size: 14px; color:white" >Εξέλιξη Αιτήματος Συνταξιοδότησης</a> </li>
                           
                              
                         </ul>
                         </div>   
                        </li>
                        
                      
                          <li> <a class="text-white" style="font-size: 14px" href="insur_request.php" >Αίτημα Ασφάλισης εξαρτώμενου μέλους </a> </li>
                          <li> <a class="text-white" style="font-size: 14px" href="#">Εξέλιξη Αιτήματος/ων ασφάλισης μελους/ων</a> </li>
                         
                        
          </ul>
                    </div>
                    </li>
          
                    <li><a class="btn" data-toggle="collapse" data-target="#demo3" style="color:white;"><span class="glyphicon glyphicon-chevron-down"></span>Συνταξιούχους</a>
                    
                    <div id="demo3" class="collapse">
                        <ul>
                         
                    
                          <li> <a class="text-white" href="ret_calc.php" style="font-size: 14px">Υπολογισμός Ποσού Σύνταξης</a> </li>
                          

                       
                            <li> <a class="text-white" href="synt_form.php" style="font-size: 14px" >Λήψη Βεβαίωσης Σύνταξης</a> </li>
  
                            <li> <a class="text-white" style="font-size: 14px" href="insur_request.php" >Αίτημα Ασφάλισης εξαρτώμενου μέλους </a> </li>
                            <li> <a class="text-white" style="font-size: 14px" href="#">Εξέλιξη Αιτήματος/ων ασφάλισης μελους/ων</a> </li>
                           
                    </div>
              
                    </li>
          
                     <div class="dropdown-divider"></div>
          <li><a class="dropdown-item disabled" style="font-size: 14px" href="#">Εργοδότες</a></li>
          <li><a  class="dropdown-item disabled" style="font-size: 14px" href="#">ΚΕ.Π.Α.</a></li>
    </ul> </li>
      
      
      <
     
      <li class="nav-item"  style="margin-right: 30px;   font-family: Verdana, Geneva, sans-serif;">
        <a class="nav-link" href="vevaiwsh.php">Βεβαιώσεις</a>
      </li>
      
       <li class="nav-item"  style="margin-right: 30px;   font-family: Verdana, Geneva, sans-serif;">
        <a class="nav-link" href="#">Ανακοινώσεις</a>
      </li>
        
            
        
      <li class="nav-item"  style="margin-right: 30px;   font-family: Verdana, Geneva, sans-serif;">
        <a class="nav-link" href="plirofories.php">Πληροφορίες</a>
      </li>
      <li class="nav-item"  style="margin-right: 30px;   font-family: Verdana, Geneva, sans-serif;">
        <a class="nav-link" href="epikoinwnia.php">Επικοινωνία</a>
      </li>
   <li>
    <form class="form-inline my-2 my-lg-0" >
      <input class="form-control mr-sm-2" style="margin-top: 15px"  type="search" placeholder="Search" aria-label="Search">
      
      <button class="btn btn-outline-secondary my-2 my-sm-0" style="margin-top: 15px"  type="submit">Search</button>
    </form>

    </li>

      <?php
        if(isset($_SESSION['u_uid'])){
          echo'<li class="nav-item " style=" font-family: Verdana, Geneva, sans-serif;" >
          <p class="navbar-item" style=" font-size: 14px; margin-top:15px; color:white; margin-left:10px" >Έχετε εισέλθει ως: </p>
          </li>';
          $username=$_SESSION['u_uid'];
          echo '
          <li class="nav-item"  font-family: Verdana, Geneva, sans-serif;" >
          <a class="nav-link"  href="show-profile.php" >'.$username.'</a>
          </li>';
          echo'
          <li class="nav-item" style="  font-family: Verdana, Geneva, sans-serif;" >
          <form action="logout-inc.php" method="POST">
            <button class="btn btn-link" style=" font-size: 14px; margin-top:8px; color:white"  name="submit"   >Έξοδος</button>
            </form>
            </li>';
        }
        else{
          echo' <li class="nav-item" style="  font-family: Verdana, Geneva, sans-serif;  margin-right: 15px;  margin-left: 100px;">

            <a class="nav-link" style="margin-right:0px" name="submit" href="login.php" id="myLogin" >Είσοδος</a>
            </li>
          <li class="nav-item"  style=" font-family: Verdana, Geneva, sans-serif;  ">
            <a class="nav-link" style="margin-right:0px" name="submit" href="signup.php" id="mySignup" >Εγγραφή</a>
          </li>';
          
        }
      ?>

    
 
 </ul>  
</nav>


</header>


