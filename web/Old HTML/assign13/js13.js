function checkRadios () {
   var radios = document.getElementsByName("performance");
   if(radios[1].checked) {
      var student2 = document.getElementById("item3");
      student2.style = "display:block";
   }
   else {
      var student2 = document.getElementById("item3");
      student2.style = "display:none";
   }
}

function validate() {
   var empty = checkEmpty();
   var error = checkErrors();

   if (error) {
      document.getElementById("error_text").innerHTML = "Please correct errors!";
   }

   if (empty) {
      document.getElementById("error_text").innerHTML = "Please fill all fields!";
   }

   if (!(empty || error)) {
      document.getElementById("error_text").innerHTML = "";
      sendToPHP();
   }
}

function checkErrors() {
   var error = false;
   check1 = checkID();
   check2 = checkID2();
   check3 = checkRoom();
   check4 = checkTime();
   error = (check1 || check2 || check3 || check4);

   return error;
}

function checkID() {
   var text = document.getElementById("student_id").value;
   if (/\D+/.test(text)) {
      document.getElementById("student_id").style.backgroundColor = "#FFB4B5";
      document.getElementById("error_text_2").innerHTML = "Student ID must be numbers only!";
      return true;
   }
   else if (text == "") {
      document.getElementById("student_id").style.backgroundColor = "#FFB4B5";
      return true;
   }
   else {
      document.getElementById("student_id").style.backgroundColor = "#AAC8FF";
      document.getElementById("error_text_2").innerHTML = "";
      return false;
   }
}

function checkID2() {
   var radios = document.getElementsByName("performance");
   if(radios[1].checked) {
      var text = document.getElementById("student_id_2").value;
      if (/\D+/.test(text)) {
         document.getElementById("student_id_2").style.backgroundColor = "#FFB4B5";
         document.getElementById("error_text_3").innerHTML = "Student ID must be numbers only!";
         return true;
      }
      else if (text == "") {
         document.getElementById("student_id_2").style.backgroundColor = "#FFB4B5";
         return true;
      }
      else {
         document.getElementById("student_id_2").style.backgroundColor = "#AAC8FF";
         document.getElementById("error_text_3").innerHTML = "";
         return false;
      }
   }
   else {
      return false;
   }
}

function checkRoom() {
   var text = document.getElementById("room").value;
   if (/^(\d{3,3})$/.test(text) || /^(\d{3,3}[a-z|A-Z])$/.test(text)) {
      document.getElementById("room").style.backgroundColor = "#AAC8FF";
      document.getElementById("error_text_4").innerHTML = "";
      return false;
   }
   else if (text == "") {
      document.getElementById("room").style.backgroundColor = "#FFB4B5";
      return true;
   }
   else {
      document.getElementById("room").style.backgroundColor = "#FFB4B5";
      document.getElementById("error_text_4").innerHTML = "Room # must have 3 digits and may be followed by a letter!";
      return true;
   }
}

function checkTime() {
   var text = document.getElementById("time").value;
   if (/^(([1-9]|[1][0-2]):[0-5][0-9]\s([a|p][m]|[A|P][M]))$/.test(text)) {
      document.getElementById("time").style.backgroundColor = "#AAC8FF";
      document.getElementById("error_text_5").innerHTML = "";
      return false;
   }
   else if (text == "") {
      document.getElementById("time").style.backgroundColor = "#FFB4B5";
      return true;
   }
   else {
      document.getElementById("time").style.backgroundColor = "#FFB4B5";
      document.getElementById("error_text_5").innerHTML = 'Time must be a valid time formatted like "#:## PM" or "##:## am"!';
      return true;
   }
}

function checkEmpty() {
   var empty = false;

   var radios = document.getElementsByName("performance");
   if (!(radios[0].checked || radios[1].checked || radios[2].checked)) {
      document.getElementById("error_text_1").innerHTML = "Select a performance type!";
      empty = true;
   }
   else {
      document.getElementById("error_text_1").innerHTML = "";
   }

   var inputs = document.getElementsByClassName("input_text");
   for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].value == "") {
         inputs[i].style.backgroundColor = "#FFB4B5";
         empty = true;
      }
      else {
         inputs[i].style.backgroundColor = "#AAC8FF";
      }
   }

   if(radios[1].checked) {
      var inputs = document.getElementsByClassName("input_text_2");
      for (var i = 0; i < inputs.length; i++) {
         if (inputs[i].value == "") {
            inputs[i].style.backgroundColor = "#FFB4B5";
            empty = true;
         }
         else {
            inputs[i].style.backgroundColor = "#AAC8FF";
         }
      }
   }

   var dropboxes = document.getElementsByClassName("dropbox")
   for (var i = 0; i < 2; i++) {
      if (dropboxes[i].selectedIndex == 0) {
         dropboxes[i].style.backgroundColor = "#FFB4B5";
         empty = true;
      }
      else {
         dropboxes[i].style.backgroundColor = "#AAC8FF";
      }
   }

   return empty;
}

function sendToPHP() {
   var request = "assign13.php?new=1";

   var radios = document.getElementsByName("performance");
   for (var i = 0; i < 3; i++)
      if(radios[i].checked) {
         request += "&performance=" + radios[i].value;
      }
   request += "&first_name=" + document.getElementById("first_name").value;
   request += "&last_name=" + document.getElementById("last_name").value;
   request += "&student_id=" + document.getElementById("student_id").value;
   if(radios[1].checked) {
      request += "&first_name_2=" + document.getElementById("first_name_2").value;
      request += "&last_name_2=" + document.getElementById("last_name_2").value;
      request += "&student_id_2=" + document.getElementById("student_id_2").value;
   }
   request += "&skill=" + document.getElementById("skill").value;
   request += "&instrument=" + document.getElementById("instrument").value;
   request += "&location=" + document.getElementById("location").value;
   request += "&room=" + document.getElementById("room").value;
   request += "&time=" + document.getElementById("time").value;

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         displayPerformances(this.responseText);
      }
   };
   xhttp.open("GET", request, true);
   xhttp.send();

   document.getElementById("form").reset();
}

function displayPerformances(text) {
   var performances = JSON.parse(text);
   var insertText = "";

   for (var i = 0; i < performances.length; i++) {
      insertText += "<div class='response_item'><div>Performance Type: <b>" + performances[i].performance + "</b></div>";
      insertText += "<div>First Name: <b>" + performances[i].first_name + "</b>, Last Name: <b>" 
         + performances[i].last_name + "</b>, ID: <b>" + performances[i].student_id + "</b></div>";
      if (performances[i].performance == "Duet") {
         insertText += "<div>First Name: <b>" + performances[i].first_name_2 + "</b>, Last Name: <b>" 
            + performances[i].last_name_2 + "</b>, ID: <b>" + performances[i].student_id_2 + "</b></div>";
      }
      insertText += "<div>Skill Level: <b>" + performances[i].skill + "</b>, Instrument: <b>" 
         + performances[i].instrument + "</b></div>";
      insertText += "<div>Building: <b>" + performances[i].location + "</b>, Room: <b>" + performances[i].room 
         + "</b>, Time: <b>" + performances[i].time + "</b></div></div>";
   }

   document.getElementById("response").innerHTML = insertText;
}

function displayOnly() {
   var request = "assign13.php?new=0";
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         displayPerformances(this.responseText);
      }
   };
   xhttp.open("GET", request, true);
   xhttp.send();
}