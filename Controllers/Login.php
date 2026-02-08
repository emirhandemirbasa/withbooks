<?php
    if (isset($_POST["girisYap"]) && $_POST["girisYap"] == "GİRİŞ YAP"){
        require $_SERVER["DOCUMENT_ROOT"]."/withbooks/classes/Login.php";
        require $_SERVER["DOCUMENT_ROOT"]."/withbooks/functions/functions.php";
        $emailOrUsername = isset($_POST["username"]) ? safe_html($_POST["username"]) : "";
        $password = isset($_POST["passwordInput"]) ? safe_html($_POST["passwordInput"]) : "";
        $login = new Login($emailOrUsername,$password);
        $isHave = $login->isHaveUserNameOrEmail();
        $correctPassword = $login->isCorrectPassword();
        if (empty($emailOrUsername)){
            $_SESSION["Message"] = "Kullanıcı adı veya email alanı boş bırakılamaz!";
            $_SESSION["MessageType"] = "error";
            return;
        }
        if (empty($password)){
            $_SESSION["Message"] = "Şifre alanı boş bırakılamaz!";
            $_SESSION["MessageType"] = "error";
            return;
        }
        if ($isHave["success"]){
            if (!$isHave["isHave"] || !$correctPassword["password"]){
                $_SESSION["Message"] = "Girdiğiniz bilgiler hatalı!";
                $_SESSION["MessageType"] = "error";
                return;
            }    
        }
        $login->logIn();
        $_SESSION["Message"] = "Başarıyla hesabınıza giriş yaptınız!";
        $_SESSION["MessageType"] = "success";
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementsByName('girisYap')[0].disabled = true;

                    setTimeout(function(){
                        window.location.href = 'index.php';
                    }, 3000);
                });
            </script>";        
    }
?>