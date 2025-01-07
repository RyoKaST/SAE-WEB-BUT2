<?php
if (!session_id()) {
    session_start();
}
require_once 'User.php';
require_once 'BddConnect.php';
require_once 'SQLiteUserRepository.php';
$bdd = new BddConnect();
$pdo = $bdd->connexion();

//tableau des questions et de leurs indices pour pouvoir les afficher ensuite
$questions = [
    1 => "Quel est votre âge ?",
    2 => "Dans quelle région résidez-vous ?",
    3 => "Trouvez-vous que votre lieu de vie est adapté à vos besoins spécifiques liés à votre handicap ?",
    4 => "Votre lieu de vie correspond-il à votre choix personnel ?",
    5 => "Quelle est votre situation actuelle ?",
    6 => "Avez-vous des activités scolaires ou professionnelles ?",
    7 => "Ressentez-vous de l’isolement ou une forme d’exclusion sociale ?",
    8 => "Disposez-vous de toute l’aide nécessaire pour répondre à vos besoins ?",
    9 => "De quels types d’interventions ou de soutien avez-vous besoin ?"
];

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
                ORP.option;
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
    <link rel="icon" type="image/png" href="./img/LogoAMI.png">
    <link rel="stylesheet" href="./data/css/commun.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script>
        const Data = <?= json_encode($data) ?>;
    </script>
    <script src="data/js/enquete.js" defer></script>
</head>
<body>
<?php require_once 'header.php'; ?>

<div class="container my-5">
    <h1 class="text-center">Résultats de l'enquête</h1>
    <div id="charts"></div>
</div>

<?php require_once 'footer.php'; ?>
</body>
</html>