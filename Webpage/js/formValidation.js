
        function validateForm() {
            var name = document.forms["LoginForms"]["fullName"].value;
            var username = document.forms["LoginForms"]["uname"].value;
            var password = document.forms["LoginForms"]["psw"].value;
            var repass = document.forms["LoginForms"]["repsw"].value;
            
            var contact = document.forms["LoginForms"]["contact"].value;
            var gender = document.forms["LoginForms"]["gender"].value;
            var location = document.forms["LoginForms"]["location"].value;
            var flag = true;
            if (name == "") {
                document.getElementById('nameError').innerHTML = "Name cannot be empty";
                flag = false;
            }
            if (username == "") {
                document.getElementById('usernameError').innerHTML = "Username cannot be empty";
                flag = false;
            }
            else {
                for (var i = 0; i < username.length; i++) {
                    if (username[i] == ' ') {
                        flag = false;
                        document.getElementById('usernameError').innerHTML = "Username cannot contain whitespace";
                        break;
                    }
                }
            }
            if (password == "") {
                document.getElementById('passwordError').innerHTML = "Password cannot be empty";
                flag = false;
            }
            else {
                if (!(password.length >= 8 && password.length <= 32)) {
                    flag = false;
                    document.getElementById('passwordError').innerHTML = "Password Length must be within 8-32 chars";
                }
            }
                        if(repass!=password)
                {
                     document.getElementById('repasswordError').innerHTML = "Password doesn't Match";
                flag = false;
                }
            if (gender == "") {
                document.getElementById('genderError').innerHTML = "Gender must be selected";
                flag = false;
            }
            if (contact == "") {
                document.getElementById('contactError').innerHTML = "Contact cannot be empty";
                flag = false;
            }
            else {
                for (var i = 0; i < contact.length; i++) {
                    if (!(contact[i] == '0' || contact[i] == '1' || contact[i] == '2' || contact[i] == '3' || contact[i] == '4' || contact[i] == '5' || contact[i] == '6' || contact[i] == '7' || contact[i] == '8' || contact[i] == '9')) {
                        flag = false;
                        document.getElementById('contactError').innerHTML = "Contact no contains number only";
                        break;
                    }
                }
            }
            if (location == "") {
                document.getElementById('locationError').innerHTML = "location must be selected";
                flag = false;
            }
            return flag;
        }
    
