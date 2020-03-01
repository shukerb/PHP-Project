//elements
var firstName= document.getElementById('firstName');
var lastName= document.getElementById('lastName');
var email= document.getElementById('email');
var password= document.getElementById('password');
var confirmPassword= document.getElementById('confirmPassword');

//form
var form = document.getElementById('signInForm');

//validation colors
var green = '#4caf50';
var red = '#f44336';

//validators
function validateFirstName() {
    // check if its empty
    if (checkIfEmpty(firstName))return;
    //check if only letters are used 
    if(!checkIfOnlyLetters(firstName))return;
    return true;
}

function validateLastName() {
    // check if its empty
    if (checkIfEmpty(lastName))return;
    //check if only letters are used 
    if(!checkIfOnlyLetters(lastName))return;
    return true;
}

function validateEmail(){
    if (checkIfEmpty(email)) return;
    if(!emailCharacters(email))return;
    return true;
}

function validatePassword(){
    //check if empty
    if (checkIfEmpty(password)) return;
    //must of certain length
    if (!meetLength(password,8,20))return;
    //if matches the requierd characters
    if (!containCharacters(password))return;

}

function validateConfirmPassword() {
    if (password.className !== 'valid') {
        setInvalid(confirmPassword, 'Password must be valid');
        return;
    }
    if (password.value !== confirmPassword.value) {
        setInvalid(confirmPassword, 'Passwords must match');
        return;
    } 
    else {
        setValid(confirmPassword);
    }
    return true;
    
}










//check if field is empty
function checkIfEmpty (field){
    if (isEmpty(field.value.trim())) {
        //set field invalid
        setInvalid(field, `${field.name} must not be empty `);
        return true;
    }
    else{
        //set field to valid
        setValid(field);
        return false;
    }
}

//only letterrs are used for the name 
function checkIfOnlyLetters(field){
    if (/^[a-zA-Z]+$/.test(field.value)) {
        setValid(field);
        return true;
    }
    else{
        setInvalid(field,`${field.name} must contain only letters`);
        return false;
    }
}

//check if field is in the right length
function meetLength(field,minLength , maxLength) {
    if (field.value.length >= minLength&&field.value.length<=maxLength ) {
        setValid(field);
        return true;
    } else if (field.value.length<minLength) {
        setInvalid(field,`${field.name} must be at least ${minLength} characters long`);
        return false;
    }
    else{
        setInvalid(field,`${field.name} must be shorter than ${maxLength} characters`)
        return false;
    }
        
}
//check if the field contain the needed characters 
function containCharacters(field) {
    var regEx=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])/;
    if (field.value.match(regEx)) {
        setValid(field)
        return true;
    }
    else{
        setInvalid(field,`${field.name} must contain at least <br>*one uppercase <br> *one lowercase <br> *one number <br> *one special character`);
        return false;
    }
    
}
//check if email have a valid characters
function emailCharacters(field) {
    var regEx= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (field.value.match(regEx)) {
        setValid(field)
        return true;
    }
    else{
        setInvalid(field,`${field.name} must be valid `)
        return false;
    }
    
}

//set invaled input or field
function setInvalid(field, message){
    field.className='invalid';
    field.nextElementSibling.innerHTML=message;
    field.nextElementSibling.style.color=red;
}

//set valid field
function setValid(field){
    field.className='valid';
    field.nextElementSibling.innerHTML='';
    //field.nextElementSibling.style.color=green;
}


//check if value is empty 
function isEmpty(value) {
    if (value==='') return true ;         
}

//delete account confirmation
function DeleteConfermation(){
    var deleteAccount= window.confirm("Are you sure you want to delete your account?");

    if (deleteAccount==true) {
        location.href = "View/DeleteAccountView.php";
        alert("Your account has been deleted")
    }
}


