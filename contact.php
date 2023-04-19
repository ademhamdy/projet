<?php

include "./Controller/ContactC.php";

$error = "";

//create contact
$Contact = null;

// create an instance of the controller
$ContactC = new ContactC();
if (
    isset($_POST["nom"]) && isset($_POST["mail"]) && isset($_POST["adresse"])
) {
    if (
        !empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['adresse'])
    ) {
        $Contact = new Contact(
            null,
            $_POST['nom'],
            $_POST['mail'],
            $_POST['adresse']
        );
        $ContactC->addContact($Contact);
    } else {
        $error = "Missing information";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>HEALTH IQ</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout inner_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header class="full_bg">
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo1.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item ">
                                 <a class="nav-link" href="index.html">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">About</a>
                              </li>
                              
                              <li class="nav-item active">
                                 <a class="nav-link" href="contact.html">Contact Us</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
         <!-- end header -->
         <!-- banner -->
      </header>
      <!-- end banner -->
    <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>Contact Us</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--  contact -->
      <div class="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-6 padding_right0">
        <form action="" method="POST" id="request" class="main_form">
          <div class="row">
            <div class="col-md-12">
              <input class="contactus" placeholder="Name" type="text" name="nom" id="nom" maxlength="20" style="color: black;">
            </div>
            <div class="col-md-12">
              <input class="contactus" placeholder="Email" type="email" name="mail" id="mail" maxlength="255" style="color: black;">
            </div>
            <div class="col-md-12">
              <input class="contactus" placeholder="Adresse" type="text" name="adresse" id="adresse" maxlength="255" style="color: black;">
            </div>
            <div class="col-md-12">
              <button type="submit" value="Save" class="send_btn">Send</button>
            </div>
          </div>
        </form>

        <!-- Error span for displaying validation errors -->
        <span id="errorSpan" style="color: red;"></span>

        <!-- Ajouter le script après le formulaire pour garantir que la page est chargée -->
        <script>
// create contact
let Contact = null;

// create an instance of the controller
let ContactC = new ContactC();

// get input fields
let nomInput = document.getElementById("nom");
let mailInput = document.getElementById("mail");
let adresseInput = document.getElementById("adresse");

// add event listener to form submit
let form = document.getElementById("request");
form.addEventListener("submit", function(event) {
    event.preventDefault();
    
    let error = "";
    
    // get input values
    let nom = nomInput.value.trim();
    let mail = mailInput.value.trim();
    let adresse = adresseInput.value.trim();
    
    // validate input values
if (nom === "" || mail === "" || adresse === "") {
    error = "Missing information";
}
else {
    let nomRegex = /^[a-zA-Z ]*$/;
    let adresseRegex = /^[a-zA-Z0-9 ]*$/;
    
    if (!nom.match(nomRegex) || /\d/.test(nom)) {
  error = "Nom cannot contain numbers or special characters";
}

    else if (/\d/.test(nom)) {
        error = "Nom cannot contain numbers";
    }
    
    if (!mail.includes("@")) {
        error = "Invalid email format";
    }
    
    if (!adresse.match(adresseRegex)) {
        error = "Only letters, numbers and white space allowed in Adresse";
    }
}

    if (error === "") {
        // add contact if input data is valid
        Contact = new Contact(
            null,
            nom,
            mail,
            adresse
        );
        ContactC.addContact(Contact);
        window.location.href = "ListContacts.php";
    }
    else {
        // display error message if input data is invalid
        let errorElement = document.getElementById("errorSpan");
        errorElement.innerHTML = error;
    }
});
let nomInput = document.getElementById("nom");
nomInput.addEventListener("keyup", function(event) {
  let nom = nomInput.value.trim();
  let nomRegex = /^[a-zA-Z ]*$/;
  
  if (!nom.match(nomRegex)) {
    nomInput.style.border = "1px solid red";
  } else {
    nomInput.style.border = "1px solid #ccc";
  }
});


</script>



               </div>

            </div>
         </div>
      </div>
      <!-- end contact -->
      <!--  footer -->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>