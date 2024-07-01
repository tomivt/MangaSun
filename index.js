// script.js
document.addEventListener("DOMContentLoaded", function() {
    const profileButton = document.getElementById("profile-button");
    const backButton = document.getElementById("back-button");
    const profileBox = document.getElementById("profile-box");
    const html = document.documentElement;

    profileButton.addEventListener("click", function () {
        html.style.overflow = "hidden";
        profileBox.style.display = "flex"
    })

    backButton.addEventListener("click", function () {
        html.style.overflow = "scroll";
        profileBox.style.display = "none"
    })

});