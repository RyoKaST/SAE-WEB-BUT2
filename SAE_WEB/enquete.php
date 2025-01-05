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
            COUNT(R.Id) AS nombre_reponses,
            ROUND(COUNT(R.Id) * 100.0 / (SELECT COUNT(*) FROM Reponse WHERE IdQuestion = 1), 2) AS pourcentage_reponses
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
        echo "<thead><tr><th>Réponse</th><th>Nombre de réponses</th><th>Pourcentage</th></tr></thead><tbody>";
        foreach ($data as $row) {
            echo "<tr>
                <td>" . htmlspecialchars($row['libelle_reponse']) . "</td>
                <td>" . htmlspecialchars($row['nombre_reponses']) . "</td>
                <td>" . htmlspecialchars($row['pourcentage_reponses']) . "%</td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Aucune donnée disponible.</p>";
    }
} catch (Exception $e) {
    echo "<p>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>

<h1>Quel âge ?</h1>

<?php
try {
    $stmt = $pdo->prepare("
        SELECT 
            ORP.option AS libelle_reponse, 
            COUNT(R.Id) AS nombre_reponses,
            ROUND(COUNT(R.Id) * 100.0 / (SELECT COUNT(*) FROM Reponse WHERE IdQuestion = 1), 2) AS pourcentage_reponses
        FROM 
            Reponse R
        JOIN 
            OptionsReponses ORP ON R.IdOption = ORP.IdOption
        WHERE 
            ORP.IdQuestion = 2
        GROUP BY 
            ORP.option;
    ");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($data) {
        echo "<table class='table'>";
        echo "<thead><tr><th>Réponse</th><th>Nombre de réponses</th><th>Pourcentage</th></tr></thead><tbody>";
        foreach ($data as $row) {
            echo "<tr>
                <td>" . htmlspecialchars($row['libelle_reponse']) . "</td>
                <td>" . htmlspecialchars($row['nombre_reponses']) . "</td>
                <td>" . htmlspecialchars($row['pourcentage_reponses']) . "%</td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Aucune donnée disponible.</p>";
    }
} catch (Exception $e) {
    echo "<p>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>

<h1>Votre logement actuel répond-il aux normes d’accessibilité ?</h1>

<?php
try {
    $stmt = $pdo->prepare("
        SELECT 
            ORP.option AS libelle_reponse, 
            COUNT(R.Id) AS nombre_reponses,
            ROUND(COUNT(R.Id) * 100.0 / (SELECT COUNT(*) FROM Reponse WHERE IdQuestion = 1), 2) AS pourcentage_reponses
        FROM 
            Reponse R
        JOIN 
            OptionsReponses ORP ON R.IdOption = ORP.IdOption
        WHERE 
            ORP.IdQuestion = 3
        GROUP BY 
            ORP.option;
    ");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($data) {
        echo "<table class='table'>";
        echo "<thead><tr><th>Réponse</th><th>Nombre de réponses</th><th>Pourcentage</th></tr></thead><tbody>";
        foreach ($data as $row) {
            echo "<tr>
                <td>" . htmlspecialchars($row['libelle_reponse']) . "</td>
                <td>" . htmlspecialchars($row['nombre_reponses']) . "</td>
                <td>" . htmlspecialchars($row['pourcentage_reponses']) . "%</td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Aucune donnée disponible.</p>";
    }
} catch (Exception $e) {
    echo "<p>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>

<h1>Trouvez-vous que votre lieu de vie est adapté à vos besoins spécifiques liés à votre handicap ?</h1>

<?php
try {
    $stmt = $pdo->prepare("
        SELECT 
            ORP.option AS libelle_reponse, 
            COUNT(R.Id) AS nombre_reponses,
            ROUND(COUNT(R.Id) * 100.0 / (SELECT COUNT(*) FROM Reponse WHERE IdQuestion = 1), 2) AS pourcentage_reponses
        FROM 
            Reponse R
        JOIN 
            OptionsReponses ORP ON R.IdOption = ORP.IdOption
        WHERE 
            ORP.IdQuestion = 4
        GROUP BY 
            ORP.option;
    ");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($data) {
        echo "<table class='table'>";
        echo "<thead><tr><th>Réponse</th><th>Nombre de réponses</th><th>Pourcentage</th></tr></thead><tbody>";
        foreach ($data as $row) {
            echo "<tr>
                <td>" . htmlspecialchars($row['libelle_reponse']) . "</td>
                <td>" . htmlspecialchars($row['nombre_reponses']) . "</td>
                <td>" . htmlspecialchars($row['pourcentage_reponses']) . "%</td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Aucune donnée disponible.</p>";
    }
} catch (Exception $e) {
    echo "<p>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>

<h1>Ce lieu de vie correspond-il à votre choix ?</h1>

<?php
try {
    $stmt = $pdo->prepare("
        SELECT 
            ORP.option AS libelle_reponse, 
            COUNT(R.Id) AS nombre_reponses,
            ROUND(COUNT(R.Id) * 100.0 / (SELECT COUNT(*) FROM Reponse WHERE IdQuestion = 1), 2) AS pourcentage_reponses
        FROM 
            Reponse R
        JOIN 
            OptionsReponses ORP ON R.IdOption = ORP.IdOption
        WHERE 
            ORP.IdQuestion = 5
        GROUP BY 
            ORP.option;
    ");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($data) {
        echo "<table class='table'>";
        echo "<thead><tr><th>Réponse</th><th>Nombre de réponses</th><th>Pourcentage</th></tr></thead><tbody>";
        foreach ($data as $row) {
            echo "<tr>
                <td>" . htmlspecialchars($row['libelle_reponse']) . "</td>
                <td>" . htmlspecialchars($row['nombre_reponses']) . "</td>
                <td>" . htmlspecialchars($row['pourcentage_reponses']) . "%</td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Aucune donnée disponible.</p>";
    }
} catch (Exception $e) {
    echo "<p>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>

<h1>Avez-vous un accès facile aux soins médicaux dont vous avez besoin ?</h1>

<?php
try {
    $stmt = $pdo->prepare("
        SELECT 
            ORP.option AS libelle_reponse, 
            COUNT(R.Id) AS nombre_reponses,
            ROUND(COUNT(R.Id) * 100.0 / (SELECT COUNT(*) FROM Reponse WHERE IdQuestion = 1), 2) AS pourcentage_reponses
        FROM 
            Reponse R
        JOIN 
            OptionsReponses ORP ON R.IdOption = ORP.IdOption
        WHERE 
            ORP.IdQuestion = 6
        GROUP BY 
            ORP.option;
    ");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($data) {
        echo "<table class='table'>";
        echo "<thead><tr><th>Réponse</th><th>Nombre de réponses</th><th>Pourcentage</th></tr></thead><tbody>";
        foreach ($data as $row) {
            echo "<tr>
                <td>" . htmlspecialchars($row['libelle_reponse']) . "</td>
                <td>" . htmlspecialchars($row['nombre_reponses']) . "</td>
                <td>" . htmlspecialchars($row['pourcentage_reponses']) . "%</td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Aucune donnée disponible.</p>";
    }
} catch (Exception $e) {
    echo "<p>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>

<h1>Sentez-vous isolé ou exclus socialement ?</h1>

<?php
try {
    $stmt = $pdo->prepare("
        SELECT 
            ORP.option AS libelle_reponse, 
            COUNT(R.Id) AS nombre_reponses,
            ROUND(COUNT(R.Id) * 100.0 / (SELECT COUNT(*) FROM Reponse WHERE IdQuestion = 1), 2) AS pourcentage_reponses
        FROM 
            Reponse R
        JOIN 
            OptionsReponses ORP ON R.IdOption = ORP.IdOption
        WHERE 
            ORP.IdQuestion = 7
        GROUP BY 
            ORP.option;
    ");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($data) {
        echo "<table class='table'>";
        echo "<thead><tr><th>Réponse</th><th>Nombre de réponses</th><th>Pourcentage</th></tr></thead><tbody>";
        foreach ($data as $row) {
            echo "<tr>
                <td>" . htmlspecialchars($row['libelle_reponse']) . "</td>
                <td>" . htmlspecialchars($row['nombre_reponses']) . "</td>
                <td>" . htmlspecialchars($row['pourcentage_reponses']) . "%</td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Aucune donnée disponible.</p>";
    }
} catch (Exception $e) {
    echo "<p>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>

</body>
</html>
