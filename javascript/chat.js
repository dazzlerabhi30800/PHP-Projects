const form = document.querySelector(".typing-area");
inputField = form.querySelector(".input-field");
sendBtn = form.querySelector("button");
chatBox = document.querySelector(".chat-box");


form.onsubmit = (e) => {
    e.preventDefault(); // Prevent form from submitting
} 

sendBtn.onclick = () => {


        // Let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/insert-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "";
                scrollToBottom();
                
            }
        }

    }

    // sending the form data through ajax to php
    let formData = new FormData(form); // creating a formData object
    xhr.send(formData); // sending the  form data to php



}

chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}
chatBox.onmouseleave =  () => {
    chatBox.classList.remove("active");
}


setInterval(() => {


    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/get-chat.php",true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                // console.log('sljfslkjf');
                if(!chatBox.classList.contains("active")){

                    scrollToBottom();
                }
            }
        }

    }
     // sending the form data through ajax to php
     let formData = new FormData(form); // creating a formData object
     xhr.send(formData); // sending the  form data to php
    
},500);

function scrollToBottom(){
    chatBox.scrollTop  = chatBox.scrollHeight;
}