// validation.js

function validateForm() {
    var domaine = document.forms["myForm"]["domaine_informatique"].value;
    var titre = document.forms["myForm"]["titre"].value;
    var description = document.forms["myForm"]["description_o"].value;
    var type = document.forms["myForm"]["type_o"].value;
    var entreprise = document.forms["myForm"]["entreprise"].value;
    var lieu = document.forms["myForm"]["lieu"].value;
    var datePub = document.forms["myForm"]["date_publication"].value;
    var dateLimite = document.forms["myForm"]["date_limite"].value;
    var contact = document.forms["myForm"]["contact"].value;
    var status = document.forms["myForm"]["status_o"].value;

    if (domaine == "" || titre == "" || description == "" || type == "" || entreprise == "" || lieu == "" || datePub == "" || dateLimite == "" || contact == "" || status == "") {
        alert("Veuillez remplir tous les champs");
        return false;
    }
}
