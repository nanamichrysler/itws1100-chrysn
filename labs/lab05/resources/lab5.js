/* Lab 5 JavaScript File 
   Place variables and functions in this file */

var errors = "";
var focus = false; //used to make it so that the first blank box will be focused first
var text = false; //used to clear comments box when user is typing

function validate(formObj) {
   // put your validation code here
   // it will be a series of if statements

   if (formObj.firstName.value == "") {
      errors += "You must enter a first name\n";
      formObj.firstName.focus();
      focus = true;
   }

   if (formObj.lastName.value == "") {
      errors += "You must enter a last name\n";
      if (focus == false) {
         formObj.lastName.focus();
         focus = true;
      }
   }

   if (formObj.org.value == "") {
      errors += "You must enter an organization\n";
      if (focus == false) {
         formObj.org.focus();
         focus = true;
      }
   }

   if (formObj.comments.value == "" || formObj.comments.value == "Please enter your comments") {
      errors += "You must enter a comment (type N/A if you don't have any)";
      if (focus == false) {
         formObj.comments.focus();
         focus = true;
      }
   }

   if (errors != "") {
      alert(errors);
      return false;      
   }
   else {
      alert("Your form was successfully submitted!");
      return true;
   }
}
/* Lab 5 JavaScript File 
   Place variables and functions in this file */

var errors = "";
var focus = false; //used to make it so that the first blank box will be focused first
var text = false; //used to clear comments box when user is typing

function validate(formObj) {
   // put your validation code here
   // it will be a series of if statements
   errors = "";
   focus = false;
   text = false;

   if (formObj.firstName.value == "") {
      errors += "You must enter a first name\n";
      formObj.firstName.focus();
      focus = true;
   }

   if (formObj.lastName.value == "") {
      errors += "You must enter a last name\n";
      if (focus == false) {
         formObj.lastName.focus();
         focus = true;
      }
   }

   if (formObj.org.value == "") {
      errors += "You must enter an organization\n";
      if (focus == false) {
         formObj.org.focus();
         focus = true;
      }
   }

   if (formObj.comments.value == "" || formObj.comments.value == "Please enter your comments") {
      errors += "You must enter a comment (type N/A if you don't have any)";
      if (focus == false) {
         formObj.comments.focus();
         focus = true;
      }
   }

   if (errors != "") {
      alert(errors);
      return false;      
   }
   else {
      alert("Your form was successfully submitted!");
      return true;
   }
}

function clearText() { //for comments button
   var comment = document.getElementById("comments");   
   if (text == false) {
      comment.value = "";
      text = true;
   }
}

function putText() { //for comments button
   var comment = document.getElementById("comments");
   if (comment.value == "") {
      comment.value = "Please enter your comments";
      text = false;
   }
}