var buttonClick = false;
function noValidate() {
    buttonClick = true;
}

function checkValidate() {
    if(buttonClick) {
        return true; 
    }
    else {
        return lastChar();
    }
}

// converts all pid characters to upper case 
function toUpperid() {
    let pidInput = document.getElementById("pid").value.toUpperCase();
    document.getElementById("pid").value = pidInput;
}

// pid basic check
function pidValidity() {
    let regExp = /([A-Z]{2})([0-9]+)([A-Z])$/;
    let valid_id = document.getElementById("pid").value;
    if (!valid_id.match(regExp)) {
        document.getElementById("pid_error").innerHTML = "** Please enter a valid Patient ID **";
    }
    else {
        lastChar()
    }
}

// calculates the final character by finding remainder of digits
function lastChar() {
    let arrayInput = document.getElementById("pid").value;
    let regExp = /([A-Z]{2})([0-9]+)([A-Z])$/;
    let sum = 0;
    for (let numb of arrayInput.match(regExp)[2]) {
        sum = sum + parseInt(numb);
    }
    let remainder = (sum % 26) + 64;
    let lastChar = String.fromCharCode(remainder);
    let lastLetter = arrayInput.match(regExp)[3];
    if (lastChar == lastLetter) {
        document.getElementById("pid_error").innerHTML = "";
        return true;
    }
    else {
        document.getElementById("pid_error").innerHTML = "** Please enter a valid Patient ID **";
        return false;
    }
}

// ensures that past date cannot be selected
function date_required(){
    let current = new Date();
    let date = String(current.getDate())
    let month = String(current.getMonth() + 1);
    let year = current.getFullYear();
    if(month < 10) {
        month = "0" + month;
    }
    if(date < 10) {
        date = "0" + date;
    }
    let currentDate = year+ "-"+ month + "-" + date
    document.getElementById("bdate").setAttribute("min", currentDate);
}


// enable checkbox to become clickable and changes style when selected
function pill_time_check(id) {
    let pill_slot_select = document.getElementById(id).firstChild.checked;
    if (pill_slot_select == true) {
        document.getElementById(id).firstChild.checked = false;
        document.getElementById(id).style.color = "#00AAFF";
        document.getElementById(id).style.backgroundColor = "#FFD400";
    }
    else {
        document.getElementById(id).firstChild.checked = true;
        document.getElementById(id).style.color = "#FFD400";
        document.getElementById(id).style.backgroundColor = "#00AAFF";
    }
}

// ensures that at least one time slot is selected
function required_pill() {
    let numb = 0;
    let selected_slot = document.getElementsByName("timeSlot");
    for(let i = 0; i < selected_slot.length; i++) {
        if (selected_slot[i].checked == true) {
            numb += 1;
        }
    }
    if (numb == 0) {
        document.getElementById("pill_error").innerHTML = "** Please select at least one time slot **"
        return false
    }
    else {
        return true
    }
}

// select options for advice area
function advice_prompts() {
    let reason = document.getElementById("options").value;
    if (reason == "child_vaccine") {
        document.getElementById("advice_area").innerHTML = "Childhood vaccines: A disclaimer that multiple vaccines are normally administered in combination and may cause the child to be sluggish or feverous for 24 – 48 hours afterwards."
    }
    else if (reason == "influenza") {
        document.getElementById("advice_area").innerHTML = "Influenza: The best time to get vaccinated is in April and May each year for optimal protection over the winter months."
    }
    else if (reason == "booster") {
        document.getElementById("advice_area").innerHTML = "Covid Booster Shot: Advice that everyone should arrange to have their third shot as soon as possible and adults over the age of 30 should have their fourth shot to protect against new variant strains"
    }
    else {
        document.getElementById("advice_area").innerHTML = "Blood test: That some tests require some fasting ahead of time and that a staff member will advise them on this prior to the appointment."
    }
}


