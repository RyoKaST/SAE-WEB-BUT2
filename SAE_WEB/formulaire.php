<?php
if(!session_id())
    session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMI - Connexion</title>
    <link rel="icon" type="image/png" href="./img/LogoAMI.png">
    <link rel="stylesheet" href="./data/css/formulaire.css">
    <link rel="stylesheet" href="./data/css/commun.css">
    <script src="./data/js/global.js" type="module"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php
require_once 'header.php';
require_once 'flash.php';
messageFlash();
//Verifie si l'utilisateur est connecté
if (isset($_SESSION['user'])) {
    $idcateg = intval($_SESSION['user']['Idcateg']);
    if ($idcateg === 1) {
        $categ = "utilisateur";
    } elseif ($idcateg === 2) {
        $categ = "adherent";
    }
    else
        $categ = 'administrateur';
    ?>
    <div class="auth-container">
    <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['user']['nom']) . " " . htmlspecialchars($_SESSION['user']['prenom']); ?> !</h1>
    <p>Vous êtes enregistré en tant qu'<strong><?php echo $categ; ?></strong>.</p>
    <a href="Deconnexion.php" class="btn">Se déconnecter</a>
</div>
<?php
} else {
    ?>
    <div id="auth">
        <div class="auth-container">
            <h1>Bienvenue</h1>

            <div class="tabs">
                <button class="tab-btn" data-tab="signin">Authentification</button>
                <button class="tab-btn" data-tab="signup">Enregistrement</button>
            </div>

            <div class="tab-content" id="signin">
                <form method="post" action="signin.php" class="form">
                    <h2>Connexion</h2>
                    <div class="form-group">
                        <label for="signin-email">Adresse Email</label>
                        <input type="email" id="signin-email" name="signin-email" placeholder="Votre email..." required>
                    </div>
                    <div class="form-group">
                        <label for="signin-pwd">Mot de passe</label>
                        <input type="password" id="signin-pwd" name="signin-pwd" placeholder="Votre mot de passe..." required>
                    </div>
                    <button type="submit" class="btn">Se connecter</button>
                    <a href="#" class="forgot-link">Mot de passe oublié ?</a>
                </form>
            </div>

            <div class="tab-content hidden" id="signup">
                <form method="post" action="signup.php" class="form">
                    <h2>Inscription</h2>
                    <div class="form-group">
                        <label for="signup-civil">Civilité</label>
                        <select id="signup-civil" name="signup-civil">
                            <option value="1">M</option>
                            <option value="2">Mme</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="signup-last">Nom</label>
                        <input type="text" id="signup-last" name="signup-last" placeholder="Votre nom..." required>
                    </div>
                    <div class="form-group">
                        <label for="signup-prenom">Prénom</label>
                        <input type="text" id="signup-prenom" name="signup-prenom" placeholder="Votre prénom..." required>
                    </div>
                    <div class="form-group">
                        <label for="signup-email">Adresse Email</label>
                        <input type="email" id="signup-email" name="signup-email" placeholder="Votre email..." required>
                    </div>
                    <div class="form-group">
                        <label for="signup-pwd">Mot de passe</label>
                        <input type="password" id="signup-pwd" name="signup-pwd" placeholder="Votre mot de passe..." required>
                    </div>
                    <div class="form-actions">
                        <button type="reset" class="btn btn-outline">Annuler</button>
                        <button type="submit" class="btn">S'inscrire</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
<?php } ?>
</body>
</html>
