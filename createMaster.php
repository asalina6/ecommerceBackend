<?php 
require './inc/header.php';
session_start();
?>

<div class="loginModal">
    <div class="loginModal__content">
        <h1>Master Account Creation</h1>
        <form action="inc/createMaster.inc.php" method="POST">
            <div>
                <label for="master_firstname">First Name </label>
                <input type="text" id="master_firstname" name="master_firstname" maxlength="30" placeholder="Your first name..." value="<?php echo ($_GET['firstname'] ?? ''); ?>">
            </div>
            <div>
                <label for="master_lastname">Last Name </label>
                <input type="text" id="master_lastname" name="master_lastname" maxlength="30" placeholder="Your last name..." value="<?php echo ($_GET['lastname'] ?? '');?>">
            </div>
            <div>
                <label for="master_username">Username </label>
                <input type="text" id="master_username" name="master_username" maxlength="30" placeholder="Your username..." value="<?php echo ($_GET['user'] ?? '');?>" >
            </div>
            <div>
                <label for="master_email">Email</label>
                <input type="email" id="master_email" name="master_email" maxlength="50" placeholder="Your email..." value="<?php echo ($_GET['email'] ?? '');?>" >
            </div>
            <div>
                <label for="master_password">Password</label>
                <input type="password" id="master_password" maxlength="50" name="master_password" placeholder="Your password...">
            </div>
            <div>
                <label for="master_password_repeat">Re-enter Your Password</label>
                <input type="password" id="master_password_repeat" maxlength="50" name="master_password_repeat" placeholder="Your password again...">
            </div>
            <button type="submit" name="master-submit">Create Master Account </button>
        </form>
    </div>
</div>

    <?php require './inc/footer.php'; ?>