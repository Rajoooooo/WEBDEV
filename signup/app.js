function validateForm() {
    var firstName = document.forms["form"]["firstName"].value;
    var lastName = document.forms["form"]["lastName"].value;
    var email = document.forms["form"]["email"].value;
    var password = document.forms["form"]["password"].value;
    var retypePassword = document.forms["form"]["retypePassword"].value;



    if (firstName == "" || lastName == "" || email == "" || password == "" || retypePassword == "") 
    {
        alert("All fields must be filled out");
        return false;
    }


    if (password != retypePassword) {
        alert("Passwords do not match");
        return false;
    }

    var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
        if (!regex.test(password)) {
            alert("Password must contain at least 8 characters, including atleast one number, one uppercase, and one lowercase letter.");
    return false;
    }

    return true;
}