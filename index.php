<?php session_start();

if (!isset($_SESSION['pseudo'])) {
    header("Location: login.php");
    exit;

}?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <!-- Logo <link rel="icon" href="logo.png" type="image/png"> -->
    <title> MangaSun - Tommy NGUYEN </title>
    <script src="index.js" defer></script>
</head>

<body>

    <header>

        <div id="main-bar">

            <div id="profile">
                <button id="profile-button">
                    <img src="resources/images/profile-icon.webp" alt="profile-icon">
                </button>
                <button>
                    <img src="resources/images/favorite-icon.png" alt="favorite-icon">
                </button>
                <button>
                    <img src="resources/images/collection-icon.png" alt="collection-icon">
                </button>
                <span> <?php echo "Welcome : " . htmlspecialchars($_SESSION['pseudo']); ?> </span>
            </div>

            <img id="logo" src="resources/logos/mangasun-logo.png" alt="MangaSun logo"/>

            <form id="search-form" action="includes/search.php" method="get">
                <label>
                    <input type="search" name="query" placeholder="Search ...">
                    <button id="search-button" type="submit">
                        <img id="search-icon" src="resources/images/search-icon.png" alt="search button"/>
                    </button>
                </label>
            </form>

        </div>

    </header>

    <div id="content-box">

        <div class="side-bar">

        </div>

        <div id="mid-box">

        </div>

        <div class="side-bar">

        </div>

    </div>

    <div id="profile-box">

        <div id="a">
            <div id=b>
                <img src="resources/logos/profile-logo.png" alt="profile-logo">
            </div>
            <div id="c">
                <div id="profile-content">
                    <div class="profile-part">
                        <div id="profile-picture">
                            <img src="resources/images/profile-icon.png" alt="profile-picture">
                            <div>
                                <span> <?php echo "Pseudo : " . htmlspecialchars($_SESSION["pseudo"]); ?> </span>
                                <span> First Name : </span>
                                <span> Last Name : </span>
                            </div>
                        </div>
                        <div>

                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="profile-part">

                    </div>
                </div>
            </div>
            <div id="d">
                <button id="back-button">
                    <img src="resources/images/back-icon.svg" alt="back-button">
                </button>
            </div>

        </div>

    </div>

</body>

</html>