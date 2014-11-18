function checkPass()
{
    var password1 = document.getElementById('password1');
    var password2 = document.getElementById('password2');
    var message = document.getElementById('confirmMessage');
    if(password1.value == password2.value){
        message.innerHTML = "Passwords Match!"
    }else{
        message.innerHTML = "Passwords Do Not Match!"
    }
}