<?php
    class Genders{
        private $baglanti;
        public function __construct()
        {
            require $_SERVER["DOCUMENT_ROOT"]."/withbooks/Models/connection.php";
            $this->baglanti = $baglanti;
        }

        function getGenders(){
            $query = "SELECT * FROM genders";
            $stmt = mysqli_prepare($this->baglanti,$query);
            mysqli_stmt_execute($stmt);
            return mysqli_stmt_get_result($stmt);
        }
    }
?>