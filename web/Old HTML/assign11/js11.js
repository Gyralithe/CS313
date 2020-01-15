var products = document.getElementsByName("products[]");
var n1 = products.length;
for(var i = 0; i < n1; i++) {
   products[i].onclick = getTotal;
}

var productNames = document.getElementsByName("productNames");

var inputs = document.getElementsByTagName("input");
var n2 = inputs.length;
for(var i = 0; i < n2; i++) {
   inputs[i].autocomplete = "off";
}

function getTotal() {
   var sum = 0;
   var obj;
   for(var i = 0; i < n1; i++) {
      if(products[i].checked == true) {
         obj = JSON.parse(products[i].value);
         sum += Number.parseFloat(obj.price);
      }
   }
   var total = sum.toFixed(2);
   document.getElementById("total").value = total;
}

function checkKey(event) {
   var k = event.key;
   if (k == "Enter") {
     checkAll();
   }
}

function checkPhone() {
   var element = document.getElementById("phone");
   var pattern = /[^0-9-]/;
   if (pattern.test(element.value)) {
      element.style.backgroundColor = "#FFB4B5";
      document.getElementById("phone_alert").innerHTML = 'No letters, spaces, or symbols besides "-"!';
   }
   else {
      element.style.backgroundColor = "#AAC8FF";
      document.getElementById("phone_alert").innerHTML = "";
   }
}

function validatePhone() {
   var element = document.getElementById("phone");
   var pattern = /^(\d{3}-\d{3}-\d{4})$/;
   if (!pattern.test(element.value) && element.value != "") {
      element.style.backgroundColor = "#FFB4B5";
      document.getElementById("phone_alert").innerHTML = "Must be of format <br/>XXX-XXX-XXXX";
      return false;
   }
   else {
      element.style.backgroundColor = "#AAC8FF";
      document.getElementById("phone_alert").innerHTML = "";
      return true;
   }
}

function checkCardNumber() {
   var element = document.getElementById("credit_card");
   var pattern = /[^0-9-\s]/;
   if (pattern.test(element.value)) {
      element.style.backgroundColor = "#FFB4B5";
      document.getElementById("card_alert").innerHTML = 'No letters or symbols besides "-"!';
   }
   else {
      element.style.backgroundColor = "#AAC8FF";
      document.getElementById("card_alert").innerHTML = "";
   }
}

function validateCardNumber() {
   var element = document.getElementById("credit_card");
   var pattern1 = /^(\d{16})$/;
   var pattern2 = /^(\d{4}\s\d{4}\s\d{4}\s\d{4})$/;
   var pattern3 = /^(\d{4}-\d{4}-\d{4}-\d{4})$/;
   if (!pattern1.test(element.value) && !pattern2.test(element.value) && !pattern3.test(element.value) 
      && element.value != "") {
      element.style.backgroundColor = "#FFB4B5";
      document.getElementById("card_alert").innerHTML = 
         "Must contain 16 digits and may have 3 spaces or 3 dashes";
      return false;
   }
   else {
      element.style.backgroundColor = "#AAC8FF";
      document.getElementById("card_alert").innerHTML = "";
      return true;
   }
}

function checkExpDate() {
   var element = document.getElementById("exp_date");
   var pattern = /[^0-9/]/;
   if (pattern.test(element.value)) {
      element.style.backgroundColor = "#FFB4B5";
      document.getElementById("exp_alert").innerHTML = 'No letters or symbols besides "/"!';
   }
   else {
      element.style.backgroundColor = "#AAC8FF";
      document.getElementById("exp_alert").innerHTML = "";
   }
}

function validateExpDate() {
   var element = document.getElementById("exp_date");
   var pattern1 = /^(0[6-9]|1[0-2])\/(2019)$/;
   var pattern2 = /^(0[1-9]|1[0-2])\/(202[0-4])$/;
   if (!pattern1.test(element.value) && !pattern2.test(element.value) && element.value != "") {
      element.style.backgroundColor = "#FFB4B5";
      document.getElementById("exp_alert").innerHTML = 
         "Must be valid date of format MM/YYYY no earlier than this month (06/2019) and no later than 2024";
      return false;
   }
   else {
      element.style.backgroundColor = "#AAC8FF";
      document.getElementById("exp_alert").innerHTML = "";
      return true;
   }
}

function checkAll() {
   var list = document.getElementsByClassName("text");
   var size = list.length;
   var totalEmpty = 0;
   for(var i = 0; i < size; i++) {
      if(list[i].value == "") {
         totalEmpty++;
      }
   }

   if(totalEmpty != 0) {
      document.getElementById("empty_alert").innerHTML = "Please fill all fields!";
      return false;
   }
   else if(!validatePhone() || !validateCardNumber() || !validateExpDate()) {
      document.getElementById("empty_alert").innerHTML = "Please correct errors!";
      return false;
   }
   else if (document.getElementById("total").value == "" || document.getElementById("total").value == "0.00") {
      document.getElementById("empty_alert").innerHTML = "Please buy something!";
      return false;
   }
   else {
      document.getElementById("empty_alert").innerHTML = "";
      return true;
   }
}

function resetForm() {
   var list = document.getElementsByClassName("text");
   var size = list.length;
   for(var i = 0; i < size; i++) {
      list[i].style.backgroundColor = "#AAC8FF";
   }
   document.getElementById("phone_alert").innerHTML = "";
   document.getElementById("card_alert").innerHTML = "";
   document.getElementById("exp_alert").innerHTML = "";
   document.getElementById("empty_alert").innerHTML = "";
}