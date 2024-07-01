<?php

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin-button'])) {
        extract($_POST);

        if ($password !== $cpassword) {
            $errors['password'] = "Passwords do not match";
            $errors['cpassword'] = "Passwords do not match";
        }

        $option = ['cost' => 12];
        $hpassword = password_hash($password, PASSWORD_BCRYPT, $option);

        include "includes/database.php";
        global $db;

        $q1 = $db->query("SELECT pseudo FROM User WHERE pseudo = '$pseudo'");
        $q1->execute(['pseudo' => $pseudo]);

        if ($q1->rowCount() > 0) $errors['pseudo'] = "Pseudo already exists";

        $q2 = $db->query("SELECT email FROM User WHERE email = '$email'");
        $q2->execute(['email' => $email]);

        if ($q2->rowCount() > 0) $errors['email'] = "Email already exists";

        if (empty($errors)) {
            $q3 = $db->prepare("INSERT INTO User(pseudo, email, password) VALUES(:pseudo, :email, :password)");

            $q3->execute([
                'pseudo' => $pseudo,
                'email' => $email,
                'password' => $hpassword
            ]);

            header("Location: index.php");
            exit();
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

        <img id="logo" src="resources/logos/inscription-logo.png" alt="MangaSun logo"/>

    </div>

</header>

<div id="content-box">

    <div class="side-bar">
    </div>

    <div id="mid-box">

        <div id="connexion-box">

            <div id="connexion-form">

                <form id="signin-form" method="post">

                    <label>

                        <input type="text" name="pseudo" id="pseudo" placeholder="Enter your pseudo ..." required
                               value="<?php echo isset($_POST['pseudo']) ? htmlspecialchars($_POST['pseudo']) : ''; ?>">
                        <span><?php if (isset($errors['pseudo'])) echo $errors['pseudo']; ?></span>

                        <input type="email" name="email" id="email" placeholder="Enter your email ..." required
                               value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        <span><?php if (isset($errors['email'])) echo $errors['email']; ?></span>

                        <input type="password" name="password" id="password" placeholder="Enter your password ..." required>
                        <span><?php if (isset($errors['password'])) echo $errors['password']; ?></span>

                        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm your password ..." required>
                        <span><?php if (isset($errors['cpassword'])) echo $errors['cpassword']; ?></span>

                    </label>

                </form>

            </div>

            <div id="button-box">
                <button> Log In </button>
                <button id="back-button" onclick="location.href='index.php'">
                    <img src="resources/images/back-icon.svg" alt="back-icon">
                </button>
                <button id="signin-button" name="signin-button" type="submit" form="signin-form"> Sign In </button>
            </div>

        </div>

    </div>

    <div class="side-bar">
    </div>

</div>



</body>

</html>