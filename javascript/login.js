const form = document.querySelector(".login form");
const continueBtn = form.querySelector(".button input");
const errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault(); // Prevent form from submitting
}

continueBtn.onclick = () => {
    // Let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/login.php",true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "user.php";
                }
                else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                    
                }
            }
        }

    }

    // sending the form data through ajax to php
    let formData = new FormData(form); // creating a formData object
    xhr.send(formData); // sending the  form data to php

}