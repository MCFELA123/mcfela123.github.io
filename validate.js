
  function formValidate() {
    var i = 0;
    var legth = 9;
    var passphrase = '12345678';
    var neew = length;
    var speed = 2000;
    var text = '@gmail.com';
    var email = document.getElementById("email");
    var emvalue = document.getElementById("email").value;
    var passvalue = document.getElementById("password").value;
    var password = document.getElementById("password");
    var emailLabel = document.getElementById("lb01");
    var passLabel = document.getElementById("lb02");
    var spinner =  document.getElementById("spinner");
    var submit =  document.getElementById("form-submit");
    var checkbox = document.getElementById("checkbox");

    document.getElementById("username").maxLength = "8";
    
email.onfocus = function() {type()}

function type() {
  if(emvalue.maxLength = "8"){
    emailLabel.innerHTML = 'Enter a valid username';

    
  }
}

    if (emvalue==null || emvalue==""){
        emailLabel.innerHTML = 'Enter a username/email';
        emailLabel.style.color = 'rgb(255, 123, 123)';
       email.style.borderColor = 'rgb(255, 123, 123)';
       email.className = 'shake';


       passLabel.innerHTML = 'enter a password';
       passLabel.style.color = 'rgb(255, 123, 123)';
       password.className = 'shake';
       checkbox.className = 'shake';
      password.style.borderColor = 'rgb(255, 123, 123)';
      checkbox.style.borderColor = 'rgb(255, 123, 123)';
        return false;
        
      }

      
      
      else if(passvalue==null || passvalue=="",passvalue.length<6){
        emailLabel.innerHTML = 'Invalid username';
        emailLabel.style.color = 'rgb(255, 123, 123)';
        password.className = 'shake';
        checkbox.className = 'shake';
        email.className = 'shake';
        passLabel.innerHTML = 'min 6 characters';
        passLabel.style.color = 'rgb(255, 123, 123)';
       password.style.borderColor = 'rgb(255, 123, 123)';
       email.style.borderColor = 'rgb(255, 123, 123)';
        return false;  

        }
        


        else {
            spinner.className = 'spin';
            submit.style.opacity = '.6';
           
setTimeout(check, speed);

        }



  

    }

    window.onload = function() {clickCounter()};


    function clickCounter() {

        if (typeof(Storage) !== "undefined") {
          if (sessionStorage.clickcount) {
            sessionStorage.clickcount = document.getElementById("body").innerHTML;
          } else {
            sessionStorage.clickcount = true;
          }
          document.getElementById("body").innerHTML = true;
        } else {
          document.getElementById("body").innerHTML = "Sorry, your browser does not support web storage...";
        }
      }


    function check() {
        var i = 0;
        var email = document.getElementById("email");
        var password = document.getElementById("password");
        var emailLabel = document.getElementById("lb01");
        var passLabel = document.getElementById("lb02");
        var emvalue = document.getElementById("email").value;
        var spinner =  document.getElementById("spinner");
        var submit =  document.getElementById("form-submit");
        var checkbox = document.getElementById("checkbox");
        


document.getElementById("username").innerHTML = email.value;
if(document.getElementById("username").innerHTML.length>8) {
  document.getElementById("username").style.fontSize = '13px';
  document.getElementById("username").style.lineHeight = '30px';
}

if(emvalue.maxLength = "8"){
  
  rem();

}

else{
emailLabel.innerHTML = 'Invalid username';
}

}

function checkInfo() {
    var i = 0;
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var empass = document.getElementById("password").value;
    var emailLabel = document.getElementById("lb01");
    var passLabel = document.getElementById("lb02");
    var spinner =  document.getElementById("spinner");
    var submit =  document.getElementById("form-submit");
    var checkbox = document.getElementById("checkbox");
    var passphrase = '12345678';
    emailLabel.innerHTML = 'Valid email';
    emailLabel.style.color = 'green';
    submit.style.opacity = '1';
    spinner.className = 'spinner';
    password.className = 'shake';
    checkbox.className = 'shake';



    if ( empass == passphrase ) {
        passLabel.innerHTML = 'valid password';
        password.style.borderColor = 'rgb(224, 224, 224)';
        passLabel.style.color = 'green';
    }

    else {
        passLabel.innerHTML = 'Enter a password';
        passLabel.style.color = 'rgb(255, 123, 123)';
        password.className = 'shake';
        password.style.borderColor = 'rgb(255, 123, 123)';
       
    }
  }


   function clickCheck() {
    var checkbox = document.getElementById("checkbox");

 checkbox.style.borderColor = 'rgb(224, 224, 224)';
 checkbox.innerHTML = '&check;';
 checkbox.style.background = '#7367f0';

  

 
}

function rem() {
    document.getElementById("live").style.opacity = '0';
    document.getElementById("live").style.visibility = 'hidden';
}

function checkEmail() {
    var i = 0;
    var legth = 9;
    var passphrase = '12345678';
    var neew = legth;
    var speed = 2000;
    var text = '@gmail.com';
    var email = document.getElementById("email");
    var emvalue = document.getElementById("email").value;
    var password = document.getElementById("password");
    var emailLabel = document.getElementById("lb01");
    var passLabel = document.getElementById("lb02");
    var spinner =  document.getElementById("spinner");
    var submit =  document.getElementById("form-submit");
    var checkbox = document.getElementById("checkbox");


    
}