<?php
require 'tools.php';
$page_title = "Registration Page";
require_once 'header.php';
?>

<nav style="padding: 5px 18px 17px;">
    <ul>
        <li>
            <button style="float:left;" onclick="location.href='index.php'"
            class="booking_button">Home</button>
        </li>
    </ul>
</nav>

<main>
    <div class="booking_page">
        <span class = "error"><?php echo $registerError?></span>
        <form id = "login_form" method = "post" action = "register.php">
            <div>
                <label>Username:</label>
                <input type="text" id="userName" name="newUserName" value="">
            </div>

            <div>
                <label>Password:</label>
                <input type="text" id="password" name="newPassword" value="">
            </div>

            <div>
                <button name = "submit_button" type="submit">Sign Up</button>
                <span></span>
            </div>  
        </form>
    </div>
</main>
<?php require_once 'footer.php';?>  