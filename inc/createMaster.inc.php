<?php session_start();
require "../config/db.php";

if(isset($_POST['master-submit'])){ //Must hit the master-submit button to get this to page. Forceful entry will redirect them to the login.
    $preliminary_query = 'SELECT id FROM employees WHERE hasAdmin = 1';
    $preliminary_result = mysqli_query($conn,$preliminary_query);

    if(mysqli_num_rows($preliminary_result) == 0){
        //There is no account with admin access. We proceed.
        $firstname = $_POST['master_firstname'];
        $lastname = $_POST['master_lastname']; 
        $username = $_POST['master_username'];
        $email = $_POST['master_email'];
        $password = $_POST['master_password'];
        $password_repeat = $_POST['master_password_repeat'];
    
    
        if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($password_repeat)){
            header("Location: ../createMaster.php/error=emptyfields" . "&firstname=" . $firstname . "&lastname=" . $lastname . "&username=" . $username . "&email=" . $email);
            exit();
        //}else if(!(preg_match("/^[a-zA-Z]*$/",$firstname) && preg_match("/^[a-zA-Z]*$/",$lastname))){
        //   header("Location: ../createMaster.php/error=invalidName" . "&user=" . $username ."&email=" . $email);
        //    exit();
        }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username) && !filter_var($email,FILTER_VALIDATE_EMAIL)){
            header("Location: ../createMaster.php/error=invalid" . "&firstname=" . $firstname . "&lastname=" . $lastname);
            exit();
        }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            header("Location: ../createMaster.php/error=invalidUsername" . "&firstname=" . $firstname . "&lastname=" . $lastname . "&email=" . $email);
            exit();
        } else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            header("Location: ../createMaster.php/error=invalidEmail" . "&firstname=" . $firstname . "&lastname=" . $lastname . "&user=" . $username);
            exit();
        } else if($password !== $password_repeat){
            header("Location: ../createMaster.php/error=passwordcheck" . "&firstname=" . $firstname . "&lastname=" . $lastname . "&user=" . $username ."&email=" . $email);
            exit();
        } else{
            //query will insert data into the table. We assume this is the first account and there will be no duplicates.
            $query = 'INSERT INTO employees(firstname,lastname,username,email,loginpassword,hasReadPermission,hasEditPermission,hasAdmin) VALUES (?,?,?,?,?,1,1,1)';

            $prepared_statement = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($prepared_statement,$query)){
                header("Location: ../createMaster.php/error=sqlerror");
                exit();
            }else{
    
                $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($prepared_statement,"sssss",$firstname,$lastname,$username,$email,$hashedPassword);
                mysqli_stmt_execute($prepared_statement);
                header("Location ../login.php?master=success");
                exit();
            } 
            //close the prepared statement
            mysqli_stmt_close($prepared_statement);
        }
    }else{
        //Then there exists a master account and we redirect them.
        header("Location: ../login.php?error=masterexists");
        exit();
    }
    //executes no matter what
    mysqli_close($conn);
}else{
    //You did not access this from the submit button, redirecting you to login.
    header("Location: ../login.php?error=accessdenied");
    exit();
}
?>





