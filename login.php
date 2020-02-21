<?php 
require './inc/header.php';
session_start();
?>
     <div class="loginModal">
         <div class="loginModal__content">
             <h1>Login</h1>
             <form action="" method="POST">
                 <div>
                     <label for="username">Username </label>
                     <input type="text" id="username" name="username" maxlength="30" placeholder="Enter username" autocomplete required value="<?php echo ($_GET['user'] ?? '');?>" >
                     <div class="inner">&nbsp;</div>
                 </div>
                 <div>
                     <label for="password">Password</label>
                     <input type="password" id="password" maxlength="50" name="password" placeholder="Enter password" autocomplete required>
                     <div class="inner">&nbsp;</div>
                 </div>
                 <button type="submit" name="login-submit">Login </button>
             </form>
             <a href="#">Forgot password?</a>
             <a href="#">Don't have an account?</a>
         </div>
     </div>
<?php require './inc/footer.php'; ?>