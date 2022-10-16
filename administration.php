<?php
require 'tools.php';
if(!isset($_SESSION["user"])) {
    header("Location: login.php");
}
$page_title = "Admin Page";
require_once 'header.php';
?>
<nav style="padding: 5px 18px 17px;">
    <ul>
        <li><a href="index.php"><strong>Home</strong></a></li>
        <li><a href="register.php"><strong>Register Page</strong></a></li>
        <li><button onclick="location.href='log_out.php'" class="booking_button"><span>Logout </span></button></li>
    </ul>
</nav>

<main>
    <h1>Hellp <?php echo $_SESSION['user']['username']?></h1>
    <table>
        <tr>
            <th>Date and Time:</th>
            <th>Patient ID:</th>
            <th>Appointment Date:</th>
            <th>Appointment Time:</th>
            <th>Reason of Appointment:</th>
        </tr>
        <?php 
            $userFile = fopen("appointments.txt","r");
            while (($data = fgetcsv($userFile, 1000, "," )) !== FALSE) {
                $userData[] = $data;
            }
            foreach($userData as $data) {
                echo "<tr>";
                echo "<th>" . $data[0] . "</th>";
                echo "<th>" . $data[1] . "</th>";
                $requestedBookingDate = new DateTime($data[2]);
                echo "<th>" . $requestedBookingDate -> format("l jS F Y") . "</th>";
                echo "<th>" . $data[3] . "</th>"; 
                echo "<th>" . $data[4] . "</th>";
                echo "</tr>";
            }
            fclose($userFile);
        ?>
    </table>
</main>
<?php require_once 'footer.php';?>  