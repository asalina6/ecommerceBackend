<?php 
require '../config/db.php';

if(isset($_POST['login-submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username) || empty($password)){
        header('Location: ../login.php?error=emptyfields');
        exit();
    }else{
        $query = 'SELECT * FROM employees WHERE username = ?';
        $prepared_statement = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($prepared_statement,$query)){
            header("Location: ../login.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($prepared_statement,"s",$username);
            mysqli_stmt_execute($prepared_statement);
            $result = mysqli_stmt_get_result($prepared_statement); //only if you use a select query.
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password,$row['loginpassword']);
                if($pwdCheck == false){
                    header("Location: ../login.php?" . "username=" . $username);
                    exit();
                }else if($pwdCheck == true){
                    session_start();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['loggedin'] = true;
                    header("Location: ../index.php?login=success");
                    exit();
                }else{
                    header("Location: ../login.php?" . "username=" . $username);
                    exit();
                }
            }
            else{
                header("Location: ../login.php?" . "username=" . $username);
                exit();
            }
        }
    }

}else{
    header('Location: ../login.php');
    exit();
}




?>