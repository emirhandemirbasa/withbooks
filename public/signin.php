<?php
    if (isset($_POST["kayitOl"]) && $_POST["kayitOl"] == "KAYIT OL"){
        header("Location: signup.php");
    }
?>
<?php include "../Views/partials/__header.php"?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/withbooks/Controllers/Login.php"?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/withbooks/Views/partials/__message.php"?>


<style>
    #login {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        gap:30px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        flex-wrap: wrap;
        width: 100%;
    }
</style>
<?php include "../Views/partials/__header.php" ?>
<div id="login">
    <div class="left-div animate__animated animate__fadeInLeft">
        <h1>WITHBOOKS</h1>
        <h2>GİRİŞ YAP</h2>
        <p>Hesabınıza giriş yapmak için lütfen bilgilerinizi doğru bir şekilde girin!</p>
    </div>
    <div class="right-div animate__animated animate__fadeInRight">
        <form method="POST" id="loginForm">
            <div class="form-control">
                <label for="username">Kullanıcı Adı veya E-mail</label>
                <input type="text" name="username" placeholder="Kullanıcı adı veya e-mail giriniz...">
            </div>
            <div class="form-control">
                <label for="passwordInput">Şifre</label>
                <input type="password" name="passwordInput" placeholder="Şifrenizi girin...">
            </div>
            <div class="yanyana">
                <p>Hesabımı Hatırla</p><input type="checkbox" name="remember">
            </div>
            <div class="form-control-button">
                <button type="submit" name="girisYap" value="GİRİŞ YAP"><i class="fa-solid fa-arrow-right-to-bracket"></i> GİRİŞ YAP</button>
            </div>
            <div class="form-control question">
                <p>Bir hesabınız yok mu? <a href="signup.php">Kayıt Ol</a></p>
            </div>
        </form>
    </div>
</div>

<script>
    const username = document.getElementsByName("username")[0];
    const password = document.getElementsByName("passwordInput")[0];
    document.getElementById("loginForm").addEventListener("submit",(e)=>{
        loginErr=false;
        if (username.value==""){
            showAlert(username,"Kullanıcı adı veya email alanı boş bırakılamaz!");
            loginErr=true;
        }else{
            removeAlert(username);
        }
        if (password.value==""){
            showAlert(password,"Şifre alanı boş bırakılamaz!");
            loginErr=true;
        }else{
            removeAlert(password);
        }
        if (loginErr){
            e.preventDefault();
        }
    })
</script>

<script src="../js/Alert.js"></script>