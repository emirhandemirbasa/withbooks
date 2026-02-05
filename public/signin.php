<?php
    if (isset($_POST["kayitOl"]) && $_POST["kayitOl"] == "KAYIT OL"){
        header("Location: signup.php");
    }
?>

<style>
    #login {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        gap: 30px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        flex-wrap: wrap;
        width: 100%;
    }
</style>
<?php include "../Views/partials/__header.php" ?>
<div id="login">
    <div class="left-div animate__animated animate__fadeInLeft">
        <h1>WITHBOOKS</h1>
        <p>Hesabınızı oluşturmak için lütfen kişisel bilgilerini doğru bir şekilde giriniz.</p>
    </div>
    <div class="right-div animate__animated animate__fadeInRight">
        <form method="POST">
            <div class="form-control">
                <label for="username">Kullanıcı Adı veya E-mail</label>
                <input type="text" name="username" placeholder="Kullanıcı adı veya e-mail giriniz...">
            </div>
            <div class="form-control">
                <label for="password">Şifre</label>
                <input type="password" name="password" placeholder="Şifrenizi girin...">
            </div>
            <div class="yanyana">
                <p>Hesabımı Hatırla</p><input type="checkbox" name="remember">
            </div>
            <div class="form-control-button">
                <button type="submit" name="girisYap" value="GİRİŞ YAP"><i class="fa-solid fa-arrow-right-to-bracket"></i> GİRİŞ YAP</button>
                <button type="submit" name="kayitOl" value="KAYIT OL"><i class="fa-solid fa-circle-chevron-right"></i> KAYIT OL</button>
            </div>

        </form>
    </div>
</div>