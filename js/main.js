//validimi i te gjitha field-eve te formave
function validate(number){
    var inputList = document.getElementsByClassName("input");
    if(number == 0){
        //log in
        if(inputList[0].value == "" || inputList[1].value == ""){
            alert("Please fill in the informations!");
        }else{
            alert('Successfully logged in.')
        }
    }else if(number == 1){
        //register
        if(inputList[0].value == "" || inputList[1].value == "" || inputList[2].value == ""){
            alert("Please fill in the informations!");
        }else{
            alert('Successfully registered.')
        }
    }else if(number == 2){
        //contact
        if(inputList[0].value == "" || inputList[1].value == "" || inputList[2].value == "" || inputList[3].value == ""){
            alert("Please fill in the informations!");
        }else{
            alert('Message successfully sent.')
        }
    }
}



//Ruajtja  e vlerave te inputit ne variabla objekte per Log In
var elementListLogin = document.getElementsByClassName('input-field-login'); //krijimi i nje variable per listen e inputeve
//shtimi i eventit per secilin element te input listes
for(var i = 0; i < elementListLogin.length; i++){
    elementListLogin[i].addEventListener('keyup', function(event){
        event.preventDefault();

        loginObj = {
            ...loginObj,
            [event.target.name]: event.target.value
        }

        // if(event.target.name == 'email'){
        //     emailValue = event.target.value;
        // }
        // else if(event.target.name == 'password'){
        //     passwordValue = event.target.value;
        // }

        //Ruajtja e variablave ne objekt
        // loginObj = {
        //     email: emailValue,
        //     password: passwordValue
        // }
    })
}

//Deklarimi i objektit per Login
var loginObj = {
    email: "",
    password: ""
}
// //Deklarimi i variablave per input
// var emailValue = "";
// var passwordValue = "";
// var nameValue = "";


//Ruajtja  e vlerave te inputit ne variabla objekte per Register
var elementListRegister = document.getElementsByClassName('input-field-register');
for(var i = 0; i < elementListRegister.length; i++){
    elementListRegister[i].addEventListener('keyup', function(event){
        event.preventDefault();

        registerObj = {
            ...registerObj,
            [event.target.name]: event.target.value
        }

        // if(event.target.name == 'email'){
        //     emailValue = event.target.value;
        // }
        // else if(event.target.name == 'password'){
        //     passwordValue = event.target.value;
        // }
        // else if(event.target.name == 'name'){
        //     nameValue = event.target.value;
        // }

        // registerObj = {
        //     name: nameValue,
        //     email: emailValue,
        //     password: passwordValue
        // }
    })
}

//Deklarimi i objektit per Register
var registerObj = {
    name: "",
    email: "",
    password: ""
}

//Ruajtja  e vlerave te inputit ne variabla objekte per Contact
var elementListContact = document.getElementsByClassName('input-field-contact');
for(var i = 0; i < elementListContact.length; i++){
    elementListContact[i].addEventListener('keyup', function(event){
        event.preventDefault();

        contactObj = {
            ...contactObj,
            [event.target.name]: event.target.value
        }
    })
}

//Deklarimi i objektit per Contact
var contactObj = {
    firstname: "",
    lastname: "",
    email: "",
    message:""
}

// SLIDER i thjesht
var i = 0; // Start point
var images = [];
var time = 1000;
// Image List
images[0] = 'img/rest1.jpg';
images[1] = 'img/rest2.jpg';
images[2] = 'img/rest3.jpg';
images[3] = 'img/rest4.jpg';
images[4] = 'img/rest5.jpg';
// Change Image
function changeImg(){
    document.slide.src = images[i];
    if(i < images.length - 1){
        i++;
    } else {
        i = 0;
    }
    setTimeout("changeImg()", time);
}
window.onload = changeImg;