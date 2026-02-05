<?php require "../classes/Genders.php"?>

<?php 
    $adim = isset($_GET["step"]) ? $_GET["step"] : 1;
    if (isset($_POST["geridonBtn"]) && $_POST["geridonBtn"] == "GERİ DÖN"){
        header("Location: signup.php?step=1");
    }else if (isset($_POST["ilerleBtn"]) && $_POST["ilerleBtn"] == "İLERLE"){
        header("Location: signup.php?step=2");
    }else if (isset($_POST["girisYap"]) && $_POST["girisYap"] == "GİRİŞ YAP"){
        header("Location: signin.php");
    }
?>

<?php
    $cinsiyet = new Genders();
    $cinsiyetObject = $cinsiyet->getGenders();
?>
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
        <?php if($adim == 1):?>
        <div class="left-div animate__animated animate__fadeInLeft">
            <h1>WITHBOOKS</h1>
            <p>Hesabınızı oluşturmak için lütfen kişisel bilgilerini doğru bir şekilde giriniz.</p>
        </div>
        <div class="right-div animate__animated animate__fadeInRight">
            <form method="POST">
                <div class="form-control">
                    <label for="name">Adınız</label>
                    <input type="text" name="name" placeholder="Adınızı girin...">
                </div>
                <div class="form-control">
                    <label for="surname">Soyadınız</label>
                    <input type="text" name="surname" placeholder="Soyadınızı girin...">
                </div>
                <div class="form-control">
                    <label for="birthdate">Doğum Tarihiniz</label>
                    <input type="date" name="birthdate" max="2008-01-01" min="1960-01-01">
                </div>         
                <div class="form-control">
                    <label for="gender">Cinsiyetiniz</label>
                    <select name="gender">
                        <option value="0">Cinsiyetinizi Seçin</option>
                        <?php while($cinsiyet = mysqli_fetch_assoc($cinsiyetObject)):?>
                            <option value="<?= $cinsiyet["id"];?>"><?= $cinsiyet["gender"];?></option>
                        <?php endwhile?>
                    </select>
                </div>                  
                <div class="form-control-button">
                    <button type="submit" name="girisYap" value="GİRİŞ YAP"><i class="fa-solid fa-arrow-right-to-bracket"></i> GİRİŞ YAP</button>  
                    <button type="submit" name="ilerleBtn" value="İLERLE"><i class="fa-solid fa-circle-chevron-right"></i> İLERLE</button>     
                </div>  
                
            </form>
        </div>
        <?php elseif ($adim==2):?>
        <div class="left-div animate__animated animate__fadeInLeft">
            <h1>WITHBOOKS</h1>
            <p>Hesabınızı oluşturmak için lütfen Kullanıcı adı, E-mail ve Şifrenizi eksiksiz ve doğru bir biçimde girin.</p>
        </div>
        <div class="right-div animate__animated animate__fadeInRight">
            <form method="POST">
                <div class="form-control">
                    <label for="username">Kullanıcı Adı</label>
                    <input type="text" name="username" placeholder="Kullanıcı adınızı girin...">
                </div>
                <div class="form-control">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" placeholder="E-mail adresinizi girin...">
                </div>
                <div class="form-control">
                    <label for="password">Şifreniz</label>
                    <input type="password" name="password" placeholder="Şifre (1x)">
                </div>         
                <div class="form-control">
                    <label for="repassword">Şifre Tekrar</label>
                    <input type="password" name="repassword" placeholder="Şifre (2x)">
                </div>                  
                <div class="form-control-button">
                    <button type="submit" name="geridonBtn" value="GERİ DÖN"><i class="fa-solid fa-circle-chevron-left"></i> GERİ DÖN</button>  
                    <button type="submit" name="tamamlaBtn" value="TAMAMLA"><i class="fa-solid fa-circle-chevron-right"left></i> TAMAMLA</button>     
                </div>  
                
            </form>
        </div>
        <?php endif?>
    </div>
    <?php include "../Views/partials/__footer.php"?>