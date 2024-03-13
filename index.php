<!DOCTYPE html>
<html>
<head>
    <title>Gestion des cartes SIM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        
        nav {
            background-color: #555;
            color: #fff;
            float: left;
            width: 25%;
            padding: 20px;
            height: calc(100vh - 40px);
        }
        
        nav a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #fff;
        }
        
        .content {
            float: left;
            width: 80%;
            padding: 20px;
        }
        .alert-icon {
    position: fixed;
    top: 30px;
    right: 35px;
    width: 40px;
    height: 40px;
    background-color: red; 
    border-radius: 50%;
    cursor: pointer;
}

        footer {
    text-align: center;
    padding: 2rem 0;
    background-color: #333;
    color: #fff;
    margin-top: 633px
}

    </style>
</head>
<body>
    <header>
        <h1><strong>Gestion des cartes SIM</strong></h1>
    </header>
    <nav>
    <br>
    <a href="index.php" style="text-decoration: underline;">Accueil</a>
    <br>
    <a href="gestion_des_cartes_sim.php" style="text-decoration: underline;">Gestion des cartes SIM</a>
    <br>
    <a href="gestion_recharges.php" style="text-decoration: underline;">Gestion des recharges</a>
    </nav>
    <div id="alert-icon" class="alert-icon">
    <a href="notification.php" style="text-decoration: none; color: inherit; display: flex; justify-content: center; align-items: center;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16" style="margin-top: 9px;">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
        </svg>
    </a>
    </div>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Votre Société.Tous droits réservés.</p>
    </footer>
</body>
</html>
