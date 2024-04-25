function validateForm() {
    var domaine_informatique = document.forms["myForm"]["domaine_informatique"].value;
    var titre = document.forms["myForm"]["titre"].value;
    var description = document.forms["myForm"]["description_o"].value;
    var type = document.forms["myForm"]["type_o"].value;
    var entreprise = document.forms["myForm"]["entreprise"].value;
    var lieu = document.forms["myForm"]["lieu"].value;
    var datePub = document.forms["myForm"]["date_publication"].value;
    var dateLimite = document.forms["myForm"]["date_limite"].value;
    var contact = document.forms["myForm"]["contact"].value;
    var status = document.forms["myForm"]["status_o"].value;

    // Vérifier si les champs sont vides
    if (domaine == "" || titre == "" || description == "" || type == "" || entreprise == "" || lieu == "" || datePub == "" || dateLimite == "" || contact == "" || status == "") {
        alert("Veuillez remplir tous les champs");
        return false;
    }

    // Vérifier si titre contient seulement des lettres
    if (!/^[a-zA-Z]+$/.test(titre)) {
        alert("Le champ Titre doit contenir uniquement des lettres");
        return false;
    }

    // Vérifier si description contient seulement des lettres
    if (!/^[a-zA-Z]+$/.test(description)) {
        alert("Le champ Description doit contenir uniquement des lettres");
        return false;
    }

    // Vérifier si type contient seulement des lettres
    if (!/^[a-zA-Z]+$/.test(type)) {
        alert("Le champ Type doit contenir uniquement des lettres");
        return false;
    }

    // Vérifier si datePub est égale à la date du système
    var currentDate = new Date().toISOString().slice(0, 10);
    if (datePub !== currentDate) {
        alert("La date de publication doit être égale à la date du système");
        return false;
    }

    // Vérifier si dateLimite est différente de la date du système
    if (dateLimite === currentDate) {
        alert("La date limite ne peut pas être la même que la date du système");
        return false;
    }

    // Vérifier si contact contient seulement 8 chiffres
    if (!/^\d{8}$/.test(contact)) {
        alert("Le champ Contact doit contenir exactement 8 chiffres");
        return false;
    }

    // Si tout est valide, retourner true
    return true;
}
