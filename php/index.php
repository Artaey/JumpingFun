<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jftest";
    $conn = new mysqli($servername, $username, $password, $dbname);

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formular.css?<?php echo time(); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f4a342204d.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <div id="logo"> <img src="assets/logojumpingfun.png" alt="JumpingFuns Logo"></div>

<h1 class="overskrift1">Login</h1>
    <div class="container">

      <form class="<?php if($_SERVER["REQUEST_METHOD"] == "POST"){ if($_SESSION["iserror"] == "error"){ echo("error");}} ?>" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="uname"><b>Brugernavn</b></label> <br>
        
        <div class="inputicon">
          <i class="fa-solid fa-user"></i>
          <input type="text" placeholder="Indtast brugernavn" name="uname" required>
        </div>
        
        <label for="psw"><b>Kodeord</b></label>  
        <br>
        <div class="inputicon">
          <i class="fa-solid fa-lock"></i>
          <input type="password" placeholder="Indtast kodeord" name="psw" required>
        </div>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['uname'];
            $psw = $_POST['psw'];
            $sql = "SELECT kode FROM bruger WHERE brugernavn='$name'";
            $result = $conn->query($sql);
            $hashed = "";

            while($row = $result->fetch_assoc()) {
              $hashed = $row["kode"];
            }
            if(password_verify($psw, $hashed)){
              header("Location: opret.php");
            }else{
              echo("<span id='error'>Forkert brugernavn eller kodeord</span>");
              $_SESSION["iserror"] = "error";
            }
        }
        ?>
     
        <span class="psw"><a href="#">Glemt kodeord?</a></span>
        
        <label id="husk" class="mindretekst">
          <input type="checkbox" checked="checked" name="remember"> Husk mig
        </label>
      
        <button type="submit">Login</button>

        <p class="mindretekst"> Opret dig her 
        <br>
        <button class="button button2">Opret</button> </p>
      </form>

    </div>
    
</body>
</html>