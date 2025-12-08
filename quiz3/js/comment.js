$(document).ready(function() {
    document.getElementById("commentForm").onsubmit = function(e) {
        //get values
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let comment = document.getElementById("comment").value.trim();

        //make sure all fields are filled out
        if (name === "" || email === "" || comment === "") {
            e.preventDefault();
            alert("Please fill out all required fields.");
        }
    };
});