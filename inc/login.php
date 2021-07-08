<?php
// Initialize the session
session_start();
include '../inc/functions.php';

// Include config file
require_once "../config-site.php";
 
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
                        if(password_verify($password, $hashed_password)){
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
                    }
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

?>
