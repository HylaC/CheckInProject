//validimi i te gjitha fields te form-ave
function validate(number){
    var inputList = document.getElementsByClassName("input");
    if(number === 0){
        //Sign In form
        if(inputList[0].value === ""){
            document.getElementById("emailError").style.display = "block";
            return false;
        }
        if(inputList[1].value === ""){
            document.getElementById("emailError").innerHTML ="";
            document.getElementById("passError").style.display = "block";
            return false;
        }
    }
    else if(number === 1){
        //Sign Up form
        if(inputList[0].value === ""){
            document.getElementById("nameError").style.display = "block";
            return false;
        }if(inputList[1].value === ""){
            document.getElementById("nameError").innerHTML ="";
            document.getElementById("emailError").style.display = "block";
            return false;
        }if(inputList[2].value === ""){
            document.getElementById("nameError").innerHTML ="";
            document.getElementById("emailError").innerHTML ="";
            document.getElementById("passError").style.display = "block";
            return false;
        }else{
            alert('You\'re Successfully registered.');
            return true;
        }
    }
    else if(number === 2){
        //Contact form
        if(inputList[0].value === ""){
            document.getElementById("nameError").style.display = "block";
            return false;
        }else if(inputList[1].value === ""){
            document.getElementById("nameError").innerHTML ="";
            document.getElementById("lastNameError").style.display = "block";
            return false;
        }else if(inputList[2].value === ""){
            document.getElementById("nameError").innerHTML ="";
            document.getElementById("lastNameError").innerHTML ="";
            document.getElementById("emailError").style.display = "block";
            return false;
        }else if(inputList[3].value === ""){
            document.getElementById("nameError").innerHTML ="";
            document.getElementById("lastNameError").innerHTML ="";
            document.getElementById("emailError").innerHTML ="";
            document.getElementById("messageError").style.display = "block";
            return false;
        }else{
            alert('Your Message is successfully sent.')
            return true;
        }
    }
}

//Validimi i tipit te inputit nese eshte string me regex
document.getElementById('name').addEventListener('keyup', function(event){
    var value = this.value;
    ValidateName(value);

    function ValidateName(name){
        if(/^[A-Za-z\s]+$/.test(name)) //metoda .test bene vertetimin e RegEx-it
        {
            var red = document.getElementById('name');
            red.style.border = 'green 5px solid';
            red.style.color = 'green';
            return (true);
        }else{
            var red = document.getElementById('name');
            red.style.border = 'red 5px solid';
            red.style.color = 'red';
            return (false);
        }
    }
});

//Validimi i tipit te inputit nese eshte email me regex
document.getElementById('email').addEventListener('keyup', function(event){
    var value = this.value;
    ValidateEmail(value);

    function ValidateEmail(mail){
        if(/^[A-Za-z\d\._]+@[A-Za-z\d\._]+\.[A-Za-z\d]{3,}+$/.test(mail))
        {
            var red = document.getElementById('email');
            red.style.border = 'green 5px solid';
            red.style.color = 'green';
            return (true);
        }else{
            var red = document.getElementById('email');
            red.style.border = 'red 5px solid';
            red.style.color = 'red';
            return (false);
        }
    }
});

//Validimi i tipit te inputit nese eshte perfshine string, numra dhe karaktere me regex
document.getElementById('password').addEventListener('keyup', function(event){
    var value = this.value;
    ValidatePassword(value);

    function ValidatePassword(password){
        if (/^[a-zA-Z0-9!@#$%^&*]{6,16}$/.test(password))
        {
            var red = document.getElementById('password');
            red.style.border = 'green 5px solid';
            red.style.color = 'green';
            return (true);
        }else{
            var red = document.getElementById('password');
            red.style.border = 'red 5px solid';
            red.style.color = 'red';
            return (false);
        }
    }
});

// SLIDER-i
var divElements = document.getElementsByClassName('slider-content');
var sliderIndex = 0;

document.getElementsByClassName("slider")[0].addEventListener('click', function(event){
    divElements[sliderIndex].classList.remove('active');
    divElements[sliderIndex].classList.add('not-active');

    sliderIndex++;
    if(sliderIndex == divElements.length) sliderIndex = 0;

    divElements[sliderIndex].classList.add('active');
    divElements[sliderIndex].classList.remove('not-active');
})




//Ruajtja  e vlerave te inputit ne variabla objekte per Sign In
// var elementListSignin = document.getElementsByClassName('input-field-login'); //krijimi i nje variable per listen e inputeve
// //shtimi i eventit per secilin element te input listes
// for(var i = 0; i < elementListSignin.length; i++){
//     elementListSignin[i].addEventListener('keyup', function(event){
//         event.preventDefault();

//         //Sign In objektit ne menyre dinamike ia vendosim vlerat specifike te input parametrave
//         signinObj = {
//             ...signinObj, //mere nje kopje te vlerave te deklaruara
//             [event.target.name] : event.target.value //apliko ndryshime tek vlerat e rejat .name e mer emrin 
//             //e atributit .value ja jep vleren
//         }
//     })
// }

// //Deklarimi i objektit per Sign In dhe atributet e tij
// var signinObj = {
//     email: "",
//     password: ""
// }

// //Ruajtja  e vlerave te inputit ne variabla objekte per Register
// var elementListSignup = document.getElementsByClassName('input-field-register');
// for(var i = 0; i < elementListSignup.length; i++){
//     elementListSignup[i].addEventListener('keyup', function(event){
//         event.preventDefault();

//         signupObj = {
//             ...signupObj,
//             [event.target.name]: event.target.value
//         }
//     })
// }

// //Deklarimi i objektit per Sign Up dhe atributet e tij
// var signupObj = {
//     name: "",
//     email: "",
//     password: ""
// }

// //Ruajtja  e vlerave te inputit ne variabla objekte per Contact
// var elementListContact = document.getElementsByClassName('input-field-contact');
// for(var i = 0; i < elementListContact.length; i++){
//     elementListContact[i].addEventListener('keyup', function(event){
//         event.preventDefault();

//         contactObj = {
//             ...contactObj,
//             [event.target.name]: event.target.value
//         }
//     })
// }

// //Deklarimi i objektit per Contact dhe atributet e tij
// var contactObj = {
//     firstname: "",
//     lastname: "",
//     email: "",
//     message:""
// }