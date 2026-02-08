<?php
    if (isset($_POST["kayitol"]) && $_POST["kayitol"] ==  "KAYIT OL"){
        require $_SERVER["DOCUMENT_ROOT"]."/withbooks/functions/functions.php";
        $email = safe_html($_POST["email"]);
        $password = safe_html($_POST["password"]);
        $repassword = safe_html($_POST["repassword"]);
        $email = isset($email) ? $email : "";
        $password = isset($password) ? $password : "";
        $repassword = isset($repassword) ? $repassword : "";

        require $_SERVER["DOCUMENT_ROOT"]."/withbooks/classes/Register.php";
        $signUp = new Register($email,$password,$repassword);
        $passErr = $signUp->passwordControl();
        $err = false;
        if (empty($email)){
            $_SESSION["Message"] = "E-Mail alanı boş bırakılamaz!";
            $_SESSION["MessageType"] = "error";
            $err=true;
            return;
        }
        if (empty($password)){
            $_SESSION["Message"] = "Şifre alanı boş bırakılamaz!";
            $_SESSION["MessageType"] = "error";
            $err=true;
        }
        if (empty($repassword)){
            $_SESSION["Message"] = "Şifre tekrar alanı boş bırakılamaz!";
            $_SESSION["MessageType"] = "error";
            $err=true;            
            return;
        }       
        if ($passErr=="ERROR1"){
            $_SESSION["Message"] = "Girdiğiniz şifreler uyuşmuyor!";
            $_SESSION["MessageType"] = "error";
            $err=true;            
            return;            
        }else if ($passErr=="ERROR2"){
            $_SESSION["Message"] = "Şifreniz 8-32 karakter arasında olmalıdır!";
            $_SESSION["MessageType"] = "error";
            $err=true;            
            return;            
        }
        if (!$signUp->emailControl()){
            $_SESSION["Message"] = "Geçersiz E-Mail adresi kullandınız!";
            $_SESSION["MessageType"] = "error";
            $err=true;            
            return;
        }
        $isHaveEmail = $signUp->isHaveEmail();
        if ($isHaveEmail["success"]){
            if ($isHaveEmail["isHave"]){
                $_SESSION["Message"] = "Bu E-Mail adresi kullanılıyor!";
                $_SESSION["MessageType"] = "error";
                $err=true;
                return;                
            }
        }else{
            echo "Hata var!";
            return;
        }
        if (!$err){
            if($signUp->createAccount()["success"]){
                $_SESSION["Message"] = "Hesabınız başarıyla oluşturuldu, giriş yapabilirsiniz!";
                $_SESSION["MessageType"] = "success";
                echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementsByName('kayitol')[0].disabled = true;

                            setTimeout(function(){
                                window.location.href = 'signin.php';
                            }, 3000);
                        });
                    </script>";
            }else{
                echo "HESAP OLUŞTURULAMADI!";
            }
        }
    }
?>