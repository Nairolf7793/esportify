//suppression des alert message
setTimeout(function(){
    let alertMessage = document.getElementById("message-alert");
        if(alertMessage) {
            setTimeout(() =>alertMessage.remove(),500);
        }
    },3000);
