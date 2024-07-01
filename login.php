<?php

    session_start();

    $_SESSION['pseudo'] = $_POST['pseudo'];

    include "includes/database.php";
    global $db;

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login-button'])) {

        $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if (!empty($pseudo) && !empty($password)) {

            $q1 = $db->prepare("SELECT password FROM User WHERE pseudo = :pseudo");
            $q1 -> execute(['pseudo' => $pseudo]);

            if ($q1->rowCount() == 0) {
                $errors['pseudo'] = "Profile does not exist";
            } else {
                $result = $q1->fetch(PDO::FETCH_ASSOC);

                if (password_verify($password, $result['password'])) {

                    $_SESSION['pseudo'] = $pseudo;

                    header("Location: index.php");
                    exit;

                } else {
                    $errors['password'] = "Invalid password";
                }
            }
        }
    }
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signin.css">
    <!-- Logo <link rel="icon" href="logo.png" type="image/png"> -->
    <title> MangaSun Sign In - Tommy NGUYEN </title>
</head>

<body>

<header>

    <div id="main-bar">

        <img id="logo" src="resources/logos/connexion-logo.png" alt="Connexion logo"/>

    </div>

</header>

<div id="content-box">

    <div class="side-bar">
    </div>

    <div id="mid-box">

        <div id="connexion-box">

            <div id="connexion-form">

                <form id="login-form" method="post">

                    <label>

                        <input type="text" name="pseudo" id="pseudo" placeholder="Enter your pseudo ..." required
                               value="<?php echo isset($_POST['pseudo']) ? htmlspecialchars($_POST['pseudo']) : ''; ?>">
                        <span> <?php if (isset($errors['pseudo'])) echo $errors['pseudo']; ?> </span>

                        <input type="password" name="password" id="password" placeholder="Enter your password ..." required>
                        <span> <?php if (isset($errors['password'])) echo $errors['password']; ?> </span>

                    </label>

                </form>

            </div>

            <div id="button-box">
                <div>
                    <button onclick="location.href='signin.php'"> Sign In </button>
                    <button id="back-button" onclick="location.href='index.php'">
                        <img src="resources/images/back-icon.svg" alt="back-icon">
                    </button>
                    <button id="login-button" name="login-button" type="submit" form="login-form"> Log In </button>
                </div>
            </div>

        </div>

    </div>

    <div class="side-bar">
    </div>

</div>



</body>

</html>