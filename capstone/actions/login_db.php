<?php
// Start session
session_start();

// Include database configuration file
require_once 'db.php';

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){

    // Get user input
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare a select statement
    $sql = "SELECT * FROM register WHERE email = ?";

    if($stmt = mysqli_prepare($conn, $sql)){

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        // Set parameters
        $param_email = $email;

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){

            // Store result
            mysqli_stmt_store_result($stmt);

            // Check if email exists, if yes then verify password
            if(mysqli_stmt_num_rows($stmt) == 1){

                // Bind result variables
                mysqli_stmt_bind_result($stmt, $id, $firstname, $lastname, $contact_number, $email, $hashed_password);
                if(mysqli_stmt_fetch($stmt)){

                    // Verify password
                    if(password_verify($password, $hashed_password)){

                        // Password is correct, so start a new session
                        session_start();

                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["firstname"] = $firstname;
                        $_SESSION["lastname"] = $lastname;
                        $_SESSION["contact_number"] = $contact_number;
                        $_SESSION["email"] = $email;

                        // Redirect user to welcome page
                        header("location: welcome.php");
                        exit;

                    } else{

                        // Password is not valid, display a generic error message
                        $login_err = "Invalid email or password.";

                    }
                }
            } else{

                // Email doesn't exist, display a generic error message
                $login_err = "Invalid email or password.";

            }
        } else{
            // Something went wrong with the query execution, display a generic error message
            $login_err = "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
}
?>
