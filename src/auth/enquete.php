<?php

use database\BddConnect;

if (!session_id()) {
    session_start();
}
require_once '../classes/User.php';
require_once '../database/BddConnect.php';
require_once '../classes/SQLiteUserRepository.php';
$bdd = new BddConnect();
$pdo = $bdd->connexion();


$questions = [];
try {
    $stmt = $pdo->query("SELECT IdQuestion, Question AS question FROM Questions ORDER BY IdQuestion");
    $questions = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
} catch (Exception $e) {
    die("Erreur lors de la récupération des questions : " . $e->getMessage());
}

$data = [];

foreach ($questions as $id => $question) {
    try {
        $stmt = $pdo->prepare("
            SELECT 
                ORP.option AS libelle_reponse, 
                COUNT(R.Id) AS nombre_reponses,
                ROUND(COUNT(R.Id) * 100.0 / (SELECT COUNT(*) FROM Reponse WHERE IdQuestion = :id), 2) AS pourcentage_reponses
            FROM 
                Reponse R
            JOIN 
                OptionsReponses ORP ON R.IdOption = ORP.IdOption
            WHERE 
                ORP.IdQuestion = :id
            GROUP BY 
                ORP.option
            ORDER BY 2 DESC;
        ");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data[] = [
            'question' => $question,
            'reponse' => $stmt->fetchAll(PDO::FETCH_ASSOC)
        ];
    } catch (Exception $e) {
        $data[] = [
            'question' => $question,
            'reponse' => [],
            'error' => $e->getMessage()
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMI - Enquête</title>
    <link rel="icon" type="image/png" href="../../public/assets/img/LogoAMI.png">
    <link rel="stylesheet" href="../../public/assets/css/enquete.css">
    <link rel="stylesheet" href="../../public/assets/css/commun.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script>
        const Data = <?= json_encode($data) ?>;
    </script>
    <script src="../../public/assets/js/enquete.js" defer></script>
</head>
<body>
<?php require_once '../components/header.php'; ?>

<div class="container my-5">
    <h1 class="text-center">Résultats de l'enquête</h1>
    <div id="charts"></div>
</div>

<?php require_once '../components/footer.php'; ?>
</body>
</html>