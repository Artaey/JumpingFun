<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jftest";
    $conn = new mysqli($servername, $username, $password, $dbname);

    session_start();
    $_POST['fam'] = "0";
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

    <a href="javascript:history.back()" id="tilbage">
      <i class="fa-solid fa-arrow-left"></i>
    </a>

<h1 class="overskrift1">opret <?php if($_SESSION["from"] == "brugere"){echo "tilknyttet";} ?></h1>
    <div class="container">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

      
        <label for="uname"><b>Brugernavn</b></label> 
        <br>
        <div class="inputicon <?php if($_SERVER["REQUEST_METHOD"] == "POST"){ if($_SESSION["iserror"] == "error"){ echo("error");}} ?>">
          <i class="fa-solid fa-user"></i>
          <input type="text" placeholder="Indtast brugernavn" name="uname" required>
        </div>
        
        <?php if($_SERVER["REQUEST_METHOD"] == "POST"){ if($_SESSION["iserror"] == "error"){ echo("<span id='error'>Brugernavn allerede taget</span><br><br>");}} ?>
        
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

        <br>

        <div class="row" <?php if($_SESSION["from"] == "brugere"){echo "style='display:none'";} ?>>
        <div class="column">
        <div class="checkboxdiv">
          <input type="checkbox" value="1" name="fam"> 
        </div>
      </div>

      <div class="column right">
        <label id="checkbox" class="mindretekst">Denne konto er en familiekonto </label> 
      </div>
    </div>

      <div class="row">
        <div class="column">
          <input type="checkbox" name="remember"  required>
        </div>

        <div class="column right">
          <label id="checkbox" class="mindretekst">
             Jeg har læst og accepteret JumpingFun 
            apps <span class="pink">vilkår og betingelser</span></label>
      </div>
    </div>
      
        <button type="submit">Opret mig</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['uname'];
            $bdate = $_POST['bdate'];
            $tlf = $_POST['tlf'];
            $email = $_POST['email'];
            $fam = $_POST['fam'];
            
            $psw = password_hash($_POST['psw'], PASSWORD_DEFAULT);
            
            $sql = "SELECT brugernavn FROM bruger WHERE brugernavn='$name'";
            $result = $conn->query($sql);
            $num = 0;
            while($row = $result->fetch_assoc()) {
              $num++;
            }
            if($num == 0){
              $sql = "INSERT INTO bruger(brugernavn, fødselsdato, tlf, email, isfam, kode) VALUES ('$name', '$bdate', '$tlf', '$email', '$fam', '$psw')";
              $conn->query($sql);
              if($_SESSION["from"] == "brugere"){
                $voksen = $_SESSION["userwho"];
                $sql = "INSERT INTO familie(brugernavn_voksen, brugernavn_barn) VALUES ('$voksen', '$name')";
                $conn->query($sql);
                header("Location: brugere.php");
              }else{
                header("Location: index.php");
              }
            }else{
              $_SESSION["iserror"] = "error";
            }
        }
        ?>

    </div>
    
</body>
</html>