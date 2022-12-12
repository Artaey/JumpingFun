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
        if($num <= 0){
            $_SESSION["barn"] = $row[0];
            $num ++;
        }
    }
    $user = $_SESSION['barn'];
    $sql = "SELECT email, fødselsdato, isfam, tlf FROM bruger WHERE brugernavn='$user'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $_SESSION["email"] = $row["email"];
        $_SESSION["bdate"] = $row["fødselsdato"];
        $_SESSION["isfam"] = $row["isfam"];
        $_SESSION["tlf"] = $row["tlf"];
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
    <title>Profil</title>
</head>
<body>
    <header>
        <h1 class="overskrift2">PRO<span class="pink">FIL</span></h1>
    </header>

    <a href="javascript:history.back()" id="tilbage">
        <i class="fa-solid fa-arrow-left"></i>
    </a>

    <div id="content">
        <div class="icons profilicon">
            <div class="brugercon">
                <div id="proicon" class="brugericon rang1">
                    <img src="assets/barn1.jpg" alt="profil image">
                </div>
                <div class="brugernavn mindretekst">
                    <?php
                        echo $_SESSION['barn'];
                    ?>
                </div>
            </div>
        </div>
        <div id="box">
            <p class="brugerinfo">
                <i class="fa-solid fa-user"></i> <?php echo $_SESSION['barn']; ?>
            </p>
            <p class="brugerinfo">
                <i class="fa-solid fa-cake-candles"></i> <?php echo $_SESSION['bdate']; ?>
            </p>
            <p class="brugerinfo">
                <i class="fa-solid fa-mobile-screen-button"></i> <?php echo $_SESSION['tlf']; ?>
            </p>
            <p class="brugerinfo">
                <i class="fa-solid fa-envelope"></i> <?php echo $_SESSION['email']; ?>
            </p>
            <p class="brugerinfo">
                <svg xmlns="http://www.w3.org/2000/svg" width="29.972" height="29.262" viewBox="0 0 29.972 29.262">
                    <g id="Årskort_icon_whitesmall" data-name="Årskort icon whitesmall" transform="translate(1.337 1.404)">
                        <g id="Icon_feather-credit-cardsmall" data-name="Icon feather-credit-cardsmall" transform="matrix(0.899, 0.438, -0.438, 0.899, -5.373, 11.458)">
                            <path id="Pathsmall_43" data-name="Pathsmall 43" d="M1.558,0H15.584a1.558,1.558,0,0,1,1.558,1.558v9.35a1.558,1.558,0,0,1-1.558,1.558H1.558A1.558,1.558,0,0,1,0,10.908V1.558A1.558,1.558,0,0,1,1.558,0Z" transform="translate(8.138 -8.038)" fill="#fff" stroke="#083649" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            <path id="Pathsmall_44" data-name="Pathsmall 44" d="M0,0H15.964" transform="translate(9.316 -5.587)" fill="#fff" stroke="#083649" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </g>
                        <g id="Icon_feather-credit-cardsmall-2" data-name="Icon feather-credit-cardsmall" transform="translate(7.016 -1.749) rotate(42)">
                            <path id="Pathsmall_43-2" data-name="Pathsmall 43" d="M1.525,0H15.255A1.525,1.525,0,0,1,16.78,1.525v9.153A1.525,1.525,0,0,1,15.255,12.2H1.525A1.525,1.525,0,0,1,0,10.678V1.525A1.525,1.525,0,0,1,1.525,0Z" transform="translate(5.407 3.932)" fill="#fff" stroke="#083649" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </g>
                        <g id="Icon_feather-credit-cardsmall-3" data-name="Icon feather-credit-cardsmall" transform="translate(14.402 0) rotate(52)">
                            <path id="Pathsmall_43-3" data-name="Pathsmall 43" d="M1.894,0H18.944a1.894,1.894,0,0,1,1.894,1.894V13.261a1.894,1.894,0,0,1-1.894,1.894H1.894A1.894,1.894,0,0,1,0,13.261V1.894A1.894,1.894,0,0,1,1.894,0Z" transform="translate(0 0)" fill="#fff" stroke="#083649" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            <path id="Pathsmall_44-2" data-name="Pathsmall 44" d="M0,0H20.838" transform="translate(0 5.683)" fill="#fff" stroke="#083649" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </g>
                    </g>
                </svg>
                 Årskort
            </p>
            <p class="brugerinfo">
                <i class="fa-solid fa-user-group"></i> <?php if($_SESSION['isfam'] == 1){ echo "Voksen bruger";} else{ echo "Børne bruger";}; ?>
            </p>
        </div>
    </div>

    <nav>
        <div id="bruger">
            <a href="brugere.php" class="navtext">
                <i class="fa-solid fa-user-group navicon"></i>
                <br>
                Brugere
            </a>
        </div>
        <div id="aarskort">
            <a href="aarskort.php" class="navtextbig">
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
            <a href="#" class="navtext pink">
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
                <a href="#">
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