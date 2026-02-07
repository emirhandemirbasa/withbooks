<?php
    class Register{
        private $email,$password,$repassword,$baglanti;

        function __construct($email,$password,$repassword)
        {
            $this->email=$email;
            $this->password=$password;
            $this->repassword=$repassword;
            require $_SERVER["DOCUMENT_ROOT"]."/withbooks/Models/connection.php";
            $this->baglanti=$baglanti;
        }

        function passwordControl(){
            if ($this->password!=$this->repassword){
                return "ERROR1";
            }
            if (!(strlen($this->password)>=8 && strlen($this->password)<=32)){
                return "ERROR2";
            }
            return "SUCCESS";
        }

        function emailControl(){
            if (filter_var($this->email,FILTER_VALIDATE_EMAIL) && 
                preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $this->email)){
                return true;
            }else{
                return false;
            }
        }

        function createAccount(){
            $fakeUserName = $this->createUserFakeUsername();
            $sorgu = "INSERT INTO accounts (username,email,password) VALUES (?,?,?)";
            $hashed_password = password_hash($this->password,PASSWORD_BCRYPT);
            $stmt = mysqli_prepare($this->baglanti,$sorgu);
            if (!$stmt){
                return ["success"=>false,"erorr"=>mysqli_error($this->baglanti)];
            }
            if (!mysqli_stmt_bind_param($stmt,"sss",$fakeUserName,$this->email,$hashed_password)){
                return ["success"=>false,"error"=>mysqli_stmt_error($stmt)];
            }
            if (!mysqli_stmt_execute($stmt)){
                return ["success"=>false,"error"=>mysqli_stmt_error($stmt)];
            }
            return ["success"=>true];
        }

        private function createUserFakeUsername(){
            $fakeUserName = "";
            for($i=0;$i<=strlen($this->email);$i++){
                if ($this->email[$i]!="@"){
                    $fakeUserName .= $this->email[$i];
                }else{
                    break;
                }
            }
            $rastgele = rand(1,100000000);
            $fakeUserName = $fakeUserName.$rastgele;
            return $fakeUserName;
        }

        function isHaveEmail(){
            $sorgu = "SELECT email FROM accounts WHERE email=?";
            $stmt = mysqli_prepare($this->baglanti,$sorgu);
            if (!$stmt){
                return ["success"=>false,"error"=>mysqli_error($this->baglanti)];
            }
            if (!mysqli_stmt_bind_param($stmt,"s",$this->email)){
                return ["success"=>false,"error"=>mysqli_stmt_error($stmt)];
            }
            if (!mysqli_stmt_execute($stmt)){
                return ["success"=>false,"error"=>mysqli_stmt_error($stmt)];
            }
            return ["success"=>true,"isHave"=>(mysqli_num_rows(mysqli_stmt_get_result($stmt))>0)];
        }
    }
?>