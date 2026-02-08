<?php
    class Login{
        private $baglanti,$usernameOrEmail,$password;
        function __construct($usernameOrEmail,$password)
        {
            require $_SERVER["DOCUMENT_ROOT"]."/withbooks/Models/connection.php";
            $this->baglanti=$baglanti;
            $this->usernameOrEmail=$usernameOrEmail;
            $this->password=$password;
        }

        function isHaveUserNameOrEmail(){
            $sorgu = "SELECT * FROM accounts WHERE username=? OR email=?";
            $stmt = mysqli_prepare($this->baglanti,$sorgu);
            $username = $this->usernameOrEmail;
            $email = $this->usernameOrEmail;
            if (!$stmt){
                return ["success"=>false,"error"=>mysqli_error($this->baglanti)];
            }
            if (!mysqli_stmt_bind_param($stmt,"ss",$username,$email)){
                return ["success"=>false,"error"=>mysqli_stmt_error($stmt)];
            }
            if (!mysqli_stmt_execute($stmt)){
                return ["success"=>false,"error"=>mysqli_stmt_error($stmt)];
            }
            return ["success"=>true,"isHave"=>mysqli_num_rows(mysqli_stmt_get_result($stmt))>0];
        }

function isCorrectPassword(){
    $sorgu = "SELECT password FROM accounts WHERE username=? OR email=?";
    $username = $this->usernameOrEmail;
    $email = $this->usernameOrEmail;
    $passwordInput = $this->password;
    $stmt = mysqli_prepare($this->baglanti,$sorgu);
    if (!$stmt){
        return ["success"=>false,"error"=>mysqli_error($this->baglanti)];
    }
    if (!mysqli_stmt_bind_param($stmt,"ss",$username,$email)){
        return ["success"=>false,"error"=>mysqli_stmt_error($stmt)];
    }
    if (!mysqli_stmt_execute($stmt)){
        return ["success"=>false,"error"=>mysqli_stmt_error($stmt)];
    }
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        return ["success"=>true, "password"=>false];
    }
    $hashPassword = $row["password"];
    if (password_verify($passwordInput,$hashPassword)){
        return ["success"=>true,"password"=>true];
    } else {
        return ["success"=>true,"password"=>false];
    }
}

        function logIn(){

        }
    }
?>