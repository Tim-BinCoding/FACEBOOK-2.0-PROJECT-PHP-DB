// // CREATE ACCOUNT
document.querySelector("#create_account").addEventListener("click",create_account);
let form_create = document.querySelector(".container_form_create")
form_create .style.display = "none";
function create_account(){
    show(form_create);
}

document.querySelector(".cancel_create").addEventListener("click",cancel_create);
function cancel_create(){
    hide(form_create);
}

function show(element){
    element.style.display = "block";
}

function hide(element){
    element.style.display = "none";
}

// HIDE AND SHOW
let icon_fa_eye = document.querySelector("#hide_show");
let get_password = document.querySelector("#password");
function show_password(){
    if (get_password.type == "password"){
        icon_fa_eye.src = "images/Eye.png";
        get_password.type = "text";
        class_icon = "fa-eye";
    } else{
        get_password.type = "password";
        icon_fa_eye.src = "images/Hide.png";
    }
}
