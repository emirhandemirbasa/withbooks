
const signup = document.getElementById("signup");
signup.addEventListener("submit",(e)=>{
    let hasError = false;
    const email = document.getElementsByName("email")[0];
    const password = document.getElementsByName("password")[0];
    const repassword = document.getElementsByName("repassword")[0];
    if (email.value==""){
        showAlert(email,"E-Mail alanı boş bırakılamaz!");
        hasError=true;
    }else{
        removeAlert(email);
    }
    if (password.value==""){
        showAlert(password,"Şifre alanı boş bırakılamaz!");
        hasError=true;
    }else{
        removeAlert(password);
        
    }
    if (repassword.value==""){
        showAlert(repassword,"Şifre tekrar alanı boş bırakılamaz!");
        hasError=true;
    }else{
        removeAlert(repassword);
    }            
    if (!(password.value.length>=8 && password.value.length<=32)){
        showAlert(password,"Şifreniz 8-32 karakter arasında olmalıdır.");
        hasError=true;
    }else{
        removeAlert(password);
    }
    if (!validateEmail(email.value)){
        showAlert(email,"Hatalı bir mail girdiniz!");
        hasError=true;
    }else{
        removeAlert(email);
    }
    if (hasError){
        e.preventDefault();
    }
});

function validateEmail(email) {
    const basicRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const strictRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    return basicRegex.test(email) && strictRegex.test(email);
}    
