<?php
require 'tools.php';
$page_title = "Booking Page";
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
                <span class = "error"><?php echo $error?></span>
                <form id="booking_form" method="post" onsubmit="return checkValidate()">
                    <div>
                        <label>Patient ID:</label>
                        <input type="text" id="pid" name="pid" value="<?php if(isset($_POST['pid'])) {echo $_POST['pid'];}?>" oninput="toUpperid()" onfocusout="pidValidity()" required>
                        <span id="pid_error"></span>
                        <span><?php echo $pidError ?></span>
                    </div>

                    <div>
                        <label>Booking Date:</label>
                        <input type="date" id="bdate" name="bookingdate" value="<?php if(isset($_POST['bookingdate'])) {echo $_POST['bookingdate'];}?>" onclick="date_required()" required>
                        <span><?php echo $dateError ?></span>
                    </div>

                    <div>
                        <label>Time:</label>
                        <span id="pill_error"><?php echo $timeBookingError?></span>
                        <div class="pill_group">
                            <label id="left_pill" onmouseup="pill_time_check('left_pill')">9am - 12pm
                                <input type="checkbox" value="9am - 12pm" id="ltime" name="timeSlot[]" oninput="required_pill()">
                            </label>

                            <label id="middle_pill" onmouseup="pill_time_check('middle_pill')">12pm - 3pm
                                <input type="checkbox" value="12pm - 3pm" id="mtime" name="timeSlot[]" oninput="required_pill()">
                            </label>

                            <label id="right_pill" onmouseup="pill_time_check('right_pill')">3pm - 6pm
                                <input type="checkbox" value="3pm - 6pm" id="rtime" name="timeSlot[]" oninput="required_pill()">
                            </label>
                        </div>
                    </div>

                    <div>
                        <label>Appointment Reason:</label>
                        <select id="options" name="reasons" oninput="advice_prompts()" required>
                        <span><?php echo $reasonError?></span>
                            <option value="" selected disabled>Please Select</option>
                            <option value="child_vaccine" <?php if($_POST['reasons'] == "child_vaccine"){echo "selected";}?>>Childhood Vaccination Shots</option>
                            <option value="influenza" <?php if($_POST['reasons'] == "influenza"){echo "selected";}?>>Influenza Shot</option>
                            <option value="booster" <?php if($_POST['reasons'] == "booster"){echo "selected";}?>>Covid Booster Shots</option>
                            <option value="blood" <?php if($_POST['reasons'] == "blood"){echo "selected";}?>>Blood Test</option>
                        </select>
                    </div>

                    <div id="advice_area">
                        <p>An area for advice to be given depending on the option selected above:</p>
                        <span id="advices"><?php echo $bookingReason?></span>
                    </div>

                    <div id="submit_button">
                        <input id="submit" type="submit" value="Submit">
                    </div>

                    <div id="novalidation_submitButton">
                        <button class="phpButton" formnovalidate onclick = "noValidate">Submit without validation</button>
                    </div>      

                </form>
            </div>
        </main>
        <?php require_once 'footer.php';?>  