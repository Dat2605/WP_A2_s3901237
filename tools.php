<?php
    session_start();
    $error = $pidError = $dateError =  $timeBookingError = $reasonError = $bookingReason = $loginError = $registerError = "";
    $check = true;

    if(count($_POST) > 0) {
        //Registration php validation (Checking for registration empty fields)
        if(empty($_POST['newUserName']) || empty($_POST['newPassword'])) {
            $registerError = "**Username or Password are empty**";
        }
        else {
            $userFile = fopen("users.txt","r");
            while (($data = fgetcsv($userFile, 1000, "," )) !== FALSE) {
                $userData[] = $data;
            }
            //Registration php validation (Checking for existed username in users.txt)
            foreach ($userData as $user) {
                if($_POST['newUserName'] == $user[0]) {
                    $registerError = "**Username provided already exists**";
                    $found = true;
                }
            }
            if(!$found) {
                $filename = "users.txt";
                $fp = fopen($filename, "a");
                flock($fp, LOCK_EX);
                fputcsv($fp, array($_POST['newUserName'], $_POST['newPassword']));
                flock($fp, LOCK_UN);
                fclose($fp);
            }
        }

        //login php validation (checking for empty fields)
        if(empty($_POST['userName']) || empty($_POST['password'])) {
            $loginError = "**Username and Password are required**";
        }
        //login php validation (checking for existed login credentials)
        else {
            $userFile = fopen("users.txt","r");
            while (($data = fgetcsv($userFile, 1000, "," )) !== FALSE) {
                $userData[] = $data;
            }
            foreach ($userData as $user) {
                if($_POST['userName'] == $user[0] && $_POST['password'] == $user[1]) {
                    $_SESSION['user']['username'] = $_POST['userName'];
                    header("Location: administration.php");
                    exit;
                }
            }
            $loginError = "Login credentials don't exist";
            $filename = "accessattemps.txt";
            $fp = fopen($filename, "a");
            flock($fp, LOCK_EX);
            fputcsv($fp, array($_POST['userName'], date("Y-m-d h:ia")));
            flock($fp, LOCK_UN);
            fclose($fp);
        }

        //Ensuring all form fields are inputed
        if(empty($_POST['pid']) || empty($_POST['bookingdate']) || empty($_POST['reasons'])) {
            $error = " **All input fields are required for booking** (php)";
            $check = false;
        }
        //PID input format php validation
        else {
            if(!preg_match("/([A-Z]{2})([0-9]+)([A-Z])$/",$_POST['pid'])) {
                $pidError = "Please enter a valid patient ID (php)";
                $check = false;
            }
            //checksum remainder php validation
            else {
                $pidInput = $_POST['pid'];
                $numb = strval(intval(substr($_POST['pid'],2)));
                $arrayNumb = str_split($numb);
                $sum = 0;
                foreach($arrayNumb as $num) {
                    $sum += intval($num);
                }
                $remainder = ($sum % 26) + 64;
                $lastLetter = substr($pidInput, -1);
                $lastChar = chr($remainder);
                if ($lastChar == $lastLetter) {
                    $pidError = "";
                }
                else {
                    $pidError = "Please enter a valid patient ID (php)";
                    $check = false;
                }
            }
            //Booking Date php validation
            $currentDate = date("Y-m-d");
            $bookingDate = $_POST['bookingdate'];
            if ($currentDate > $bookingDate) {
                 $dateError = "Booking date entered is not valid (past date is selected) (php)";
                 $check = false;
            }
            //TimeSlot php validation
            if(empty($_POST['timeSlot'])) {
                $timeBookingError = "Please enter at least one booking time slot (php)";
            }
            //Booking reason php validation
            if($_POST['reasons'] == "child_vaccine") {
                $bookingReason = "Childhood vaccines: A disclaimer that multiple vaccines are normally administered in combination and may cause the child to be sluggish or feverous for 24 – 48 hours afterwards. (php)";
            }
            elseif($_POST['reasons'] == "influenza") {
                $bookingReason = "Influenza: The best time to get vaccinated is in April and May each year for optimal protection over the winter months. (php)";
            }
            elseif($_POST['reasons'] == "booster") {
                $bookingReason = "Covid Booster Shot: Advice that everyone should arrange to have their third shot as soon as possible and adults over the age of 30 should have their fourth shot to protect against new variant strains. (php)";
            }
            elseif($_POST['reasons'] == "blood") {
                $bookingReason = "Blood test: That some tests require some fasting ahead of time and that a staff member will advise them on this prior to the appointment. (php)";
            }
            else {
                $reasonError = "Please select the provided options (php)";
                $check = false;
            }

            //checking if all input fields are valid
           if(!$check) {
            $pidInput = $_POST['pid'];
            $bookingDateInput = $_POST['bookingdate'];
            $bookingTimeInput = $_POST['timeSlot'];
            $bookingReasonInput = $_POST['reasons'];
           }

           //submitting form if all validations have been passed.
           else {
            $error = "Your form has been successfully submitted";
            $filename = "appointments.txt";
            $fp = fopen($filename, "a");
            flock($fp, LOCK_EX);
            $timeSlot = "";
            foreach($_POST['timeSlot'] as $line){
                if(!empty($line)){
                    $timeSlot .= $line . "-";
                }
            }
            fputcsv($fp, array(date("H:i:s d-m-Y"), $_POST['pid'], $_POST['bookingdate'], $timeSlot, $_POST['reasons']));
            flock($fp, LOCK_UN);
            fclose($fp);
           }      
        }
    }
?>