// window.onload() = function(){
//     // if(history.go(1) === "../php/connection.php"){
//     //     alert("Ivalid email or password!");
//     // }

//     const msg = document.getElementById("error");
//     console.log(msg);
//     if(history.go(1) === "../php/connection.php"){
//         msg.innerHtml = "error";
//     }
// }

const form = document.querySelector('form');

form.addEventListener('submit', (e)=>{
    

    const captchaResponse = grecaptcha.getResponse();

    if(!captchaResponse.length > 0){
        alert("Captcha not complete");
        e.preventDefault();
        throw new Error("Captcha not complete");
    }

    const fd = new FormData(e.target);
    const params = new URLSearchParams(fd);

    fetch('http://httpbin.org/post', {
        method: "POST",
        body: params,
    })
    .then(res => res.json())
    .then(data => console.log(data))
    .catch(err => console.error(err))

});
 
