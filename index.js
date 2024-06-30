// script.js
document.addEventListener("DOMContentLoaded", function() {
    const profileButton = document.getElementById("profile-button");
    const backButton = document.getElementById("back-button");
    const connexionBox = document.getElementById("connexion-box");

    profileButton.addEventListener("click", function() {
        connexionBox.classList.remove("hidden");
    });

    backButton.addEventListener("click", function() {
        connexionBox.classList.add("hidden");
    });
});