function validation(){
    var firstName = document.getElementById('firstName');
    var lastName = document.getElementById('lastName');
    var userId = document.getElementById('userId');
    var email = document.getElementById('email');
    var phoneNumber = document.getElementById('phoneNumber');
    var address = document.getElementById('address');
    var password = document.getElementById('password');
    var confirmPassword = document.getElementById('confirmPassword');

    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var numregex = /[0-9]$/

    var valid = true;
    var check_arr = [firstName, lastName, userId, email, phoneNumber, address, password, confirmPassword];
    //checking if any field empty
    check_arr.forEach(function(id){
        valid = check_empty(id);
    });
    //checking if name contains numbers
    if(valid === true){
        valid = num_check(firstName, numregex);
        valid = num_check(lastName, numregex);
    }
    //check userId should not contain alphabets
    if(valid === true){
        valid = num_only(userId);
    }
    // check email correct form
    if(valid === true){
        valid = email_valid(email, emailRegex);
    }
    //phoneNumber check
    if(valid === true){
        valid = phone_check(phoneNumber);
    }
    //password
    if(valid === true){
        valid = password_check(password, confirmPassword);
    }
    return valid;
}

function password_check(password, confirmPassword){
    var pass = password.value;
    var cpass = confirmPassword.value;
    if(pass.length >= 6){
        attr_unset(password);
        if(pass === cpass){
            attr_unset(confirmPassword);
            return true;
        }else{
            attr_set_cpass(confirmPassword);
            return false;
        }
    }else{
        attr_set_password(password);
        return false;
    }
}

function phone_check(id){
    var text = id.value;
    var cnt = 0;
    for(var i = 0; i < text.length; i++){
        if(text[i] >= '0' && text[i] <= '9'){
            cnt++;
        }
    }
    if(cnt == text.length && cnt == 10){
        attr_unset(id);
        return true;
    }else{
        attr_set_phone(id);
        return false;
    }
}

function email_valid(id, emailRegex){
    var text = id.value;
    if(text.match(emailRegex)){
       attr_unset;
       return true; 
    }else{
        attr_set_email(id);
        return false;
    }
}

function num_only(id){
    var text = id.value;
    var cnt = 0;
    for(var i = 0; i < text.length; i++){
        if(text[i] >= '0' && text[i] <= '9'){
            cnt = cnt + 1;
        }
    }
    if(cnt == text.length && cnt == 6){
        attr_unset(id);
        return true;
    }else{
        attr_set_only_num(id);
        return false;
    }
}

function num_check(id, numregex){
    var text = id.value;
    if(text.match(numregex) > 0){
        attr_set_num(id);
        return false;
    }else{
        attr_unset(id);
        return true;
    }
}

function check_empty(id){
    if(id.value === ""){
        attr_set(id);
        return false;
    }else{
        attr_unset(id);
        return true;
    }
}

function attr_unset(id){
    id.classList.remove("wrong-input");
    id.nextElementSibling.innerHTML = "";
}

function attr_set(id){
    id.className = "wrong-input";
    id.nextElementSibling.innerHTML = "Can't be empty";
}

function attr_set_num(id){
    id.className = "wrong-input";
    id.nextElementSibling.innerHTML = "Can't contain number";
}

function attr_set_only_num(id){
    id.className = "wrong-input";
    id.nextElementSibling.innerHTML = "Id should be of length 6.";
}

function attr_set_email(id){
    id.className = "wrong-input";
    id.nextElementSibling.innerHTML = "Email wrong format";
}

function attr_set_phone(id){
    id.className = "wrong-input";
    id.nextElementSibling.innerHTML = "Phone number should be of 10 digits."
}

function attr_set_password(id){
    id.className = "wrong-input";
    id.nextElementSibling.innerHTML = "Password length should more than 5.";
}

function attr_set_cpass(id){
    id.className = "wrong-input";
    id.nextElementSibling.innerHTML = "Passwords not matching";
}