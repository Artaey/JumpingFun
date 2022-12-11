<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jftest";
    $conn = new mysqli($servername, $username, $password, $dbname);

    session_start();
    $voksen = $_SESSION['userwho'];
    $sql = "SELECT brugernavn_barn FROM familie WHERE brugernavn_voksen='$voksen'";
    $result = $conn->query($sql);

    $num = 0;
    while($row = $result->fetch_array()) {
            $_SESSION["barn".$num] = $row[0];
            $num ++;
    }

    $sql = "SELECT isfam FROM bruger WHERE brugernavn='$voksen'";
    $result = $conn->query($sql);
    while($row = $result->fetch_array()) {
        $_SESSION["isfam"] = $row[0];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f4a342204d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/jumpingfun.css">
    <script src="js/main.js" defer></script>
    <title>Årskort</title>
</head>
<body>
    <header>
        <h1 class="overskrift2">ÅRS<span class="pink">KORT</span></h1>
    </header>

    <div class="proimg">
        <a href="profil.php">
            <img src="assets/mainbruger.jpg" alt="profil image">
        </a>
    </div>

    <div id="content">
        <div id="aarsicons" class="icons">
            <a  href="profilbarn1.php" class="brugercon" <?php if($num < 1){ echo "style='display:none'";} ?>>
                <div class="brugericon rang1">
                    <img src="assets/barn1.jpg" alt="børne bruger">
                </div>
                <div class="brugernavn mindretekst">
                    <?php echo $_SESSION["barn0"]; ?>
                </div>
            </a>
            <a  href="profilbarn2.php" class="brugercon" <?php if($num < 2){ echo "style='display:none'";} ?>>
                <div class="brugericon rang2">
                    <img src="assets/barn2.jpg" alt="børne bruger">
                </div>
                <div class="brugernavn mindretekst">
                    <?php echo $_SESSION["barn1"]; ?>
                </div>
            </a>
        </div>
        <div id="box">
            <div class="aarskortqr">
            <div class="aarsind" <?php if($_SESSION["isfam"] == 1){ echo "style='display:none'";} ?>>
                    <div class="bruginfo">
                        <div class="aarsbrug">

                        </div>
                        <div class="aarsnavn stortekst">
                            <?php echo strtoupper($_SESSION["userwho"]); ?>
                        </div>
                        <div class="spacer">

                        </div>
                    </div>
                    <div class="qrbox">
                        <img src="assets/qrkode.png" alt="qr kode">
                    </div>
                    <p>
                        Gyldig til 05.06.23
                    </p>
                </div>
                <div class="aarsind" <?php if($num < 1){ echo "style='display:none'";} ?>>
                    <div class="bruginfo">
                        <div class="aarsbrug">

                        </div>
                        <div class="aarsnavn stortekst">
                            <?php echo strtoupper($_SESSION["barn0"]); ?>
                        </div>
                        <div class="spacer">

                        </div>
                    </div>
                    <div class="qrbox">
                        <img src="assets/qrkode.png" alt="qr kode">
                    </div>
                    <p>
                        Gyldig til 05.06.23
                    </p>
                </div>
                <div class="aarsind" <?php if($num < 2){ echo "style='display:none'";} ?>>
                    <div class="bruginfo">
                        <div class="aarsbrug">

                        </div>
                        <div class="aarsnavn stortekst">
                            <?php echo strtoupper($_SESSION["barn1"]); ?>
                        </div>
                        <div class="spacer">

                        </div>
                    </div>
                    <div class="qrbox">
                        <img src="assets/qrkode.png" alt="qr kode">
                    </div>
                    <p>
                        Gyldig til 05.06.23
                    </p>
                </div>
            </div>
        </div>
    </div>

    <nav>
        <div id="bruger">
            <a href="brugere.php" class="navtext">
                <i class="fa-solid fa-user-group navicon"></i>
                <br>
                Bruger
            </a>
        </div>
        <div id="aarskort">
            <a href="#" class="navtextbig">
                <svg xmlns="http://www.w3.org/2000/svg" width="78.341" height="68.258" viewBox="0 0 78.341 68.258">
                    <g id="Årskort_ikon" data-name="Årskort ikon" transform="translate(2.006 2.106)">
                        <g id="Icon_feather-credit-card" data-name="Icon feather-credit-card" transform="matrix(0.899, 0.438, -0.438, 0.899, 16.15, 8.828)">
                            <path id="Path_43" data-name="Path 43" d="M4.605,0H46.051A4.605,4.605,0,0,1,50.656,4.6v27.63a4.605,4.605,0,0,1-4.605,4.605H4.605A4.605,4.605,0,0,1,0,32.236V4.605A4.605,4.605,0,0,1,4.605,0Z" transform="translate(0 0)" fill="#083649" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                            <path id="Path_44" data-name="Path 44" d="M0,0H50.656" transform="translate(0 13.815)" fill="#083649" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                        </g>
                        <g id="Icon_feather-credit-card-2" data-name="Icon feather-credit-card" transform="translate(29.624 0.663) rotate(42)">
                            <path id="Path_43-2" data-name="Path 43" d="M4.605,0H46.051A4.605,4.605,0,0,1,50.656,4.6v27.63a4.605,4.605,0,0,1-4.605,4.605H4.605A4.605,4.605,0,0,1,0,32.236V4.605A4.605,4.605,0,0,1,4.605,0Z" transform="translate(0 0)" fill="#f900c4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                            <path id="Path_44-2" data-name="Path 44" d="M0,0H50.656" transform="translate(0 13.815)" fill="#f900c4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                        </g>
                        <g id="Icon_feather-credit-card-3" data-name="Icon feather-credit-card" transform="translate(43.042 0) rotate(52)">
                            <path id="Path_43-3" data-name="Path 43" d="M4.605,0H46.051A4.605,4.605,0,0,1,50.656,4.6V32.235a4.605,4.605,0,0,1-4.605,4.605H4.6A4.605,4.605,0,0,1,0,32.236V4.605A4.605,4.605,0,0,1,4.605,0Z" transform="translate(0 0)" fill="#083649" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                            <path id="Path_44-3" data-name="Path 44" d="M0,0H50.656" transform="translate(0 13.815)" fill="#083649" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                        </g>
                    </g>
                </svg>
                Årskort
            </a>                   
        </div>
        <div id="mere">
            <a href="#" class="navtext">
                <i class="fa-solid fa-ellipsis navicon"></i>
                <br>
                Mere
            </a>
        </div>

        <div id="merepop">
            <div>
                <a href="#" id="X">
                    <i class="fa-solid fa-xmark"></i>
                </a>
                <a href="profil.php">
                    Profil
                </a>
                <a href="information.html">
                    Information
                </a>
            </div>
        </div>

    </nav>
</body>
</html>