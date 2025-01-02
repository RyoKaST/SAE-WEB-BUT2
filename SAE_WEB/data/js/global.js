

document.addEventListener("DOMContentLoaded", function () {
    var backToTopButton = document.createElement("button");
    backToTopButton.id = "backToTop";
    backToTopButton.textContent = "   ↑   ";
    document.body.appendChild(backToTopButton);

    window.addEventListener("scroll", function () {
        if (window.scrollY > 200) {
            backToTopButton.style.display = "block";
            backToTopButton.style.outline = "thin solid #FFFF";
        } else {
            backToTopButton.style.display = "none";
        }
    });

    backToTopButton.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const tabButtons = document.querySelectorAll(".tab-btn");
    const tabContents = document.querySelectorAll(".tab-content");

    // Active "Authentification" par défaut et pas "Enregistrement"
    function initializeTabs() {
        tabButtons.forEach((btn) => btn.classList.remove("active"));
        tabContents.forEach((content) => content.classList.add("hidden"));

        // Active "Authentification" et montre le contenu de connexion
        document.querySelector(`.tab-btn[data-tab="signin"]`).classList.add("active");
        document.getElementById("signin").classList.remove("hidden");
    }

    // Fonction pour activer l'onglet sélectionné
    function activateTab(targetTab) {
        tabButtons.forEach((btn) => btn.classList.remove("active"));
        tabContents.forEach((content) => content.classList.add("hidden"));

        // Active l'onglet et affiche son contenu
        document.querySelector(`.tab-btn[data-tab="${targetTab}"]`).classList.add("active");
        document.getElementById(targetTab).classList.remove("hidden");
    }

    // Initialisation
    initializeTabs();

    // Ajoute l'écouteur d'événement pour les clics sur les boutons d'onglet
    tabButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const targetTab = button.getAttribute("data-tab");
            activateTab(targetTab);
        });
    });
});









