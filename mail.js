let login_update = document.getElementById('login');
let password_update = document.getElementById('password');
let repassword_update = document.getElementById('repassword');

let email_update = document.getElementById('email');
let button_update = document.getElementById('update');
let button_save = document.getElementById('save');

let flag = 0;


function POSTN(){
    let post_create_button = document.querySelector('.post');
    let button_post_open = document.getElementById('post_create');
    post_create_button.style.visibility = "visible";
    button_post_open.style.display = "none";
}

function up(){
    alert ('ff');
}
function re(){
    if(flag == 0) {
        
        flag = 1;
        login_update.disabled = false;
        email_update.disabled = false;
        button_save.style.display="block";
        button_update.value = "Отменить";
        repassword_update.disabled = false;
        repassword_update.value= "";
        repassword_update.type= "number";
       
       
        email_update.type = "text";
        password_update.type = "number";
        

    }
    
else {
    login_update.disabled = true;
    email_update.disabled = true;
        button_update.value = "Редактировать пароль";
        button_save.style.display="none";
        password_update.type = "password";
        flag = 0;
}
}
function post(){
    if(password_update.value == repassword_update.value) {
        let open = document.getElementById('opeen');
        document.querySelector('.password').style.display = "none";
        open.type = "number";
        password_update.style.display="none";
        repassword_update.style.display="none";
    }
    }
