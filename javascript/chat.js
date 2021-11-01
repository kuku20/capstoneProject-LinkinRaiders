const form = document.querySelector(".typing_area"),
inputField = form.querySelector(".form-control"),
sendBtn = form.querySelector("#sMsg"),
chatBox = document.querySelector(".chat_content");

$(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault();
    });
});

sendBtn.onclick = function() {
    $(document).ready(function() {
        var visitortime = new Date();
        $.ajax({
            type: "POST",
            url: "../components/timeStamp.php",
            data: {
                timestamp: visitortime.getTime(),
                timestamp_year: visitortime.getFullYear(),
                timestamp_month: (visitortime.getMonth()+1),
                timestamp_date: visitortime.getDate(),
                timestamp_hour: visitortime.getHours(),
                timestamp_minute: visitortime.getMinutes(),
                timestamp_second: visitortime.getSeconds(),
            }
        });
    });

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../components/insertChat.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                inputField.value = "";
                scrollToBottom();
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}

chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../components/chatLog.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")) {
                    scrollToBottom();
                }
                
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 500);

function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}