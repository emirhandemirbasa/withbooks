<?php require "../classes/Genders.php"?>

<?php
    $cinsiyet = new Genders();
    $cinsiyetObject = $cinsiyet->getGenders();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAYIT ARAYÜZÜ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">    
    <style>
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }
        .form-control{
            width: 100%;
            margin:15px 0px;
            display: flex;
            flex-direction: column;
            gap:3px;
            transition: all 0.33s ease-in-out;
        }
        body{
            background-color: #000;
            color: grey;
        }
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
        .form-control input,.form-control select{
            padding: 10px;
            border-radius: 10px;
            width: 100%;
            border:none;
            outline: none;
            font-family: "Inter",sans-serif;
            font-weight: 500;
            transition: all 0.33s ease-in-out;
        }
        form{
            width: 100%;
        }
        .left-div,.right-div{
             min-width: 300px;
        }
        .form-control-button{
            display: flex;
            justify-content:space-between;
        }
        .form-control-button input, .form-control-button button{
            padding: 10px;
            border-radius: 20px;
            background-color: #237bff;
            cursor: pointer;
            border:none;
            font-family: "Inter",sans-serif;
            font-weight: bold;
            color:white;
            box-shadow: 0px 0px 10px #363636;
        }
        .form-control-button input:hover,button:hover{
            background-color: #5498ff;
        }
        .form-control input:focus,.form-control select:focus{
            box-shadow: 0px 0px 7px rgba(35,123,255,1);
            border:2px rgba(35, 123, 255, 1) solid; 
        }
        .left-div h1{
            color: #dedede;
        }
        .left-div{
            max-width: 30%;
        }
        button i{
            font-size: 15px;
            margin-right: 10px;
        }
        @media screen and (max-width:768px){
            #register{
                flex-direction: column;
            }
        }
    </style>

</head>
<body>
    <div id="register">
        <div class="left-div">
            <h1>WITHBOOKS</h1>
            <p>Hesabınızı oluşturmak için lütfen kişisel bilgilerini doğru bir şekilde giriniz.</p>
        </div>
        <div class="right-div">
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
                    <button type="submit" name="girisYap"><i class="fa-solid fa-arrow-right-to-bracket"></i> GİRİŞ YAP</button>  
                    <button type="submit" name="ilerleBtn"><i class="fa-solid fa-circle-chevron-right"></i> İLERLE</button>     
                </div>  
                
            </form>
        </div>
    </div>
</body>
</html>