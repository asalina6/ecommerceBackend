<?php 
require './inc/header.php';
session_start();
?>
     <div class="loginModal">
         <div class="loginModal__content">
             <h1>Login</h1>
             <form action="inc/createMaster.inc.php" method="POST">
                 <div>
                     <label for="username">Username </label>
                     <input type="text" id="username" name="username" maxlength="30" placeholder="Your username..." value="<?php echo ($_GET['user'] ?? '');?>" >
                 </div>
                 <div>
                     <label for="password">Password</label>
                     <input type="password" id="password" maxlength="50" name="password" placeholder="Your password...">
                 </div>
                 <button type="submit" name="login-submit">Login </button>
             </form>
             <a href="#">Forgot password?</a>
         </div>
     </div>
<?php require './inc/footer.php'; ?>