<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #121212;
            color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }
        .btn-custom {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <p>Bienvenue sur votre tableau de bord.</p>
        <a href="logout.php" class="btn btn-custom">Déconnexion</a>
    </div>
</body>
</html>