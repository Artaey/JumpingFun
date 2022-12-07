<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jftest";
    $conn = new mysqli($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formular.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f4a342204d.js" crossorigin="anonymous"></script>
    <title>Opret</title>
</head>
<body>
    <div id="logo"> <img src="assets/logojumpingfun.png" alt="JumpingFuns Logo"></div>

<h1 class="overskrift1">opret</h1>
    <div class="container">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

      
        <label for="uname"><b>Brugernavn</b></label> 
        <br>
        <div class="inputicon">
          <i class="fa-solid fa-user"></i>
          <input type="text" placeholder="Indtast brugernavn" name="uname" required>
        </div>
        
        <label for="bdate"><b>Fødselsdato</b></label>  
        <br>
        <div class="inputicon">
            <i class="fa-solid fa-cake-candles"></i>
          <input type="date" placeholder="Indtast fødselsdato" name="bdate" required>
        </div>
        
        <label for="tlf"><b>Mobil nummer</b></label>  
        <br>
        <div class="inputicon">
            <i class="fa-solid fa-mobile-screen-button"></i>
          <input type="number" placeholder="Indtast nummer" name="tlf" required>
        </div>

        <label for="email"><b>Email</b></label>  
        <br>
        <div class="inputicon">
            <i class="fa-solid fa-envelope"></i>
          <input type="text" placeholder="Indtast email" name="email" required>
        </div>

        <label for="psw"><b>Kodeord</b></label>  
        <br>
        <div class="inputicon">
          <i class="fa-solid fa-lock"></i>
          <input type="password" placeholder="Indtast kodeord" name="psw" required>
        </div>

        <label id="husk" class="mindretekst">
          <input type="checkbox" checked="checked" name="remember"> Jeg har 
        </label>
      
        <button type="submit">Opret mig</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['uname'];
            $bdate = $_POST['bdate'];
            $tlf = $_POST['tlf'];
            $email = $_POST['email'];
            $psw = password_hash($_POST['psw'], PASSWORD_DEFAULT);
            if ($name == "") {
                echo "Name is empty";
            } else {
                $sql = "INSERT INTO bruger(brugernavn, fødselsdato, tlf, email, kode) VALUES ('$name', '$bdate', '$tlf', '$email', '$psw')";
                $conn->query($sql);
            }
        }
        ?>

    </div>
    
</body>
</html>