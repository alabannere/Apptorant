<?php

session_start();

include "./inc/functions.php"; 

if (isset($_POST['submit'])) {

// Include config file
require_once "config-site.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$_err = "";
 
// Processing form data when form is submitted
 
    // Check if username is empty
    if(empty(trim($_POST["user"]))){
        $_err = "Por favor, introduzca su nombre de usuario.";
    } else{
        $username = trim($_POST["user"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["pass"]))){
        $_err = "Por favor, introduzca su contraseña.";

        
    } else{
        $password = trim($_POST["pass"]);
    }
    
    // Validate credentials
    if(empty($_err) && empty($_err)){
        // Prepare a select statement
        $sql = "SELECT ID, user_login, user_pass FROM users WHERE user_login = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                       // if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["restlogin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;     

                                header('Location: ./');
                                exit;                       
                             } else{
                            // Display an error message if password is not valid
                        header('Location: ' . $_SERVER['HTTP_REFERER'].'?err=La contraseña que has introducido no es válida.');
                        exit;                            
                        }
                   // }
                } else{
                    // Display an error message if username doesn't exist

                        header('Location: ' . $_SERVER['HTTP_REFERER'].'?err=No se encontró cuenta con ese nombre de usuario.');
                        exit;

                    $_err = "No se encontró cuenta con ese nombre de usuario.";
                }
            } else{
                        header('Location: ' . $_SERVER['HTTP_REFERER'].'?err=¡Uy! Algo salió mal. Por favor, inténtelo de nuevo más tarde.');
                        exit;

            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close mysqliection
    mysqli_close($conn);
}
?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Apptorant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link href="assets/css/fa.min.css" rel="stylesheet">

    <!-- General CSS -->
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/main.css?v=8" rel="stylesheet">    

  </head>
<body class="bg-p">

<div class="container pt-4">

  <div class="mb-3 text-center ml-auto mr-auto" style="max-width: 550px; margin-top: 10%">
    <div class="card mb-4 shadow-sm ">

      <div class="card-body p-2">

        <form class="p-4 mb-3" method="POST"  action="login.php">
            <input class="form-control shadow-sm mb-4" type="text" name="user" placeholder="Usuario" >
            <input class="form-control shadow-sm mb-4" type="text" name="pass" placeholder="Contraseña" >
            <button type="submit" class="btn btn-lg btn-block btn-dark" name="submit">Ingresár</button>
        </form>
      </div>
    </div>
  </div>

</div>

  <!-- Footer -->

  <footer class="pt-2 pb-2 fixed-bottom shadow">

    <div class=" text-right pr-4"> 
  </div>    
  </footer>

  <script src="assets/js/app.js?v=1"></script>
  <!-- jQuery, then Popper.js, then Bootstrap JS -->
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- el bundle ya incluye el popper -->

</body>
</html>
