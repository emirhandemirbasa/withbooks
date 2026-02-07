   <?php require $_SERVER["DOCUMENT_ROOT"]."/withbooks/Controllers/Register.php"?>
   <style>
        #register{
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
        <?php include "../Views/partials/__header.php"?>
        <div id="register">
        <div class="left-div animate__animated animate__fadeInLeft">
            <h1>WITHBOOKS</h1>
            <h2>KAYIT OL</h2>
            <p>Hesabınızı oluşturmak için lütfen E-mail ve Şifrenizi eksiksiz ve doğru bir biçimde girin.</p>
        </div>
        <div class="right-div animate__animated animate__fadeInRight">
            <form method="POST" id="signup">
                <div class="form-control">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" placeholder="E-mail adresinizi girin...">
                </div>
                <div class="form-control">
                    <label for="password">Şifre</label>
                    <input type="password" name="password" placeholder="Şifre (1x)">
                </div>         
                <div class="form-control">
                    <label for="repassword">Şifre Tekrar</label>
                    <input type="password" name="repassword" placeholder="Şifre (2x)">
                </div>                  
                <div class="form-control-button">
                    <button type="submit" name="kayitol" value="KAYIT OL"><i class="fa-solid fa-circle-chevron-right"left></i>KAYDI TAMAMLA</button>     
                </div>  
                <div class="form-control question">
                    <p>Bir hesabınız var mı? <a href="signin.php">Giriş Yap</a></p>
                </div>
            </form>
        </div>
    </div>
    <?php include "../Views/partials/__footer.php"?>
    <script src="../js/signupControl.js"></script>
    <script src="../js/Alert.js"></script>