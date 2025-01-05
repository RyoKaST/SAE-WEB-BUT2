<?php
if (!session_id()) {
    session_start();
}

require_once 'User.php';
require_once 'BddConnect.php';
require_once 'SQLiteUserRepository.php';

$bdd = new BddConnect();
$pdo = $bdd->connexion();
$userRepo = new SQLiteUserRepository($pdo);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMI - Connexion</title>
    <link rel="icon" type="image/png" href="./img/LogoAMI.png">
    <link rel="stylesheet" href="./data/css/enquete.css">
    <link rel="stylesheet" href="./data/css/commun.css">
    <script src="./data/js/global.js" type="module"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php
require_once 'header.php';
require_once 'flash.php';
messageFlash();
?>

<h1>Qui a répondu ?</h1>

<?php
try {
    $stmt = $pdo->prepare("
        SELECT 
    ORP.option AS libelle_reponse, 
    COUNT(R.Id) AS nombre_reponses
FROM 
    Reponse R
JOIN 
    OptionsReponses ORP ON R.IdOption = ORP.IdOption
WHERE 
    ORP.IdQuestion = 1
GROUP BY 
    ORP.option;
    ");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($data) {
        echo "<table class='table'>";
        echo "<thead><tr><th>Réponse</th><th>Nombre de réponses</th></tr></thead><tbody>";
        foreach ($data as $row) {
            echo "<tr><td>" . htmlspecialchars($row['libelle_reponse']) . "</td><td>" . htmlspecialchars($row['nombre_reponses']) . "</td></tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Aucune donnée disponible.</p>";
    }
} catch (Exception $e) {
    echo "<p>Erreur de récupération des données : " . $e->getMessage() . "</p>";
}
?>

</body>
</html>
