// Sélectionnez les éléments du formulaire
const form = document.querySelector('monFormulaire');
const nomEntrepriseInput = document.querySelector('input[name="nomEntreprise"]');
const adresseInput = document.querySelector('input[name="adresse"]');
const emailInput = document.querySelector('input[name="email"]');
const dateCreationInput = document.querySelector('input[name="dateCreation"]');
// Ajouter un gestionnaire d'événements pour le formulaire
form.addEventListener('submit', function(event) {
    event.preventDefault(); // Empêcher l'envoi du formulaire pour l'instant
    if (nomEntrepriseInput.value.trim() === '') 
    {
        alert("Veuillez saisir le nom de l'entreprise.");
        return;
    }

    if (adresseInput.value.trim() === '') {
        alert("Veuillez saisir l'adresse de l'entreprise.");
        return;
    }

    if (emailInput.value.trim() === '') {
        alert("Veuillez saisir l'adresse email de l'entreprise.");
        return;
    }

    if (dateCreationInput.value.trim() === '') {
        alert("Veuillez saisir la date de création de l'entreprise.");
        return;
    }

    // Si toutes les validations sont passées, soumettre le formulaire
    form.submit();
});