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
            </div>

            <img id="logo" src="resources/logos/mangasun-logo.png" alt="MangaSun logo"/>

            <form id="search-form" action="includes/search.php" method="get">
                <label>
                    <input type="text" name="query" placeholder="Search ...">
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

    <div id="connexion-box" class="hidden">

        <form id="connexion-form" method="post">

            <label>
                <input type="text" name="pseudo" placeholder="Enter your pseudo ..." required>
                <input type="text" name="first-name" placeholder="Enter your first name ..." required>
                <input type="text" name="last-name" placeholder="Enter your last name ..." required>
                <input type="email" name="email" placeholder="Enter your email ..." required>
            </label>

        </form>

        <div>
            <button id="back-button">
                <img src="resources/images/back-icon.svg" alt="back-icon">
            </button>
            <button type="submit" form="connexion-form"> Sign in </button>
        </div>

    </div>

</body>

</html>