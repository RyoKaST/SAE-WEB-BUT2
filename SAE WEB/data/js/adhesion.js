// Sélectionne le conteneur principal
const timelineContainer = document.getElementById('breadcrumb');

// Détermine le nombre de cercles
const numberOfCircles = 3;

// Boucle pour créer le breadcrumb
for (let i = 0; i < numberOfCircles; i++) {
    const circle = document.createElement('div');
    circle.classList.add('circle');
    timelineContainer.appendChild(circle);

    if (i < numberOfCircles - 1) {
        const line = document.createElement('div');
        line.classList.add('line');
        timelineContainer.appendChild(line);
    }
}


const checkboxAssociation = document.getElementById('checkboxAssociation');

// Fonction pour masquer ou afficher les champs NOM et PRENOM
checkboxAssociation.addEventListener('change', function() {
    const divNom = document.getElementById('divNom');
    const divPrenom = document.getElementById('divPrenom');
    const divOrga = document.getElementById('divOrga')
    if (checkboxAssociation.checked) {
        // Si la checkbox est cochée, masquer les champs NOM et PRENOM afficher Organisation
        divNom.style.display = 'none';
        divPrenom.style.display = 'none';
        divOrga.style.display = 'block'

    } else {
        // Si la checkbox est décochée, afficher les champs NOM et PRENOM
        divNom.style.display = 'block';
        divPrenom.style.display = 'block';
        divOrga.style.display = 'none'
    }
});

// Fonctions pour afficher ou masquer le formulaire de carte bancaire
function showCardForm() {
    const cardForm = document.getElementById('card-form');
    cardForm.style.display = 'block'; // Affiche le formulaire
}
function hideCardForm() {
    const cardForm = document.getElementById('card-form');
    cardForm.style.display = 'none'; // Masque le formulaire
}
