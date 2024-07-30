// code pour js corresponde au dossier paiement cocher tous
var checkboxes = document.querySelectorAll("input[type = 'checkbox']");
function cocher(mycheckbox) {
    if (mycheckbox.checked == true) {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = true;
        });
    } else {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = false;
        });
    }
}
// fin code js pour cocher tous
// code js pour controller le champ prix dans la validation de paiement
function validation_prix(e) {
    var charcod = e.charCode;
    if (charcod > 47 && charcod < 58) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }
}
var prix = document.getElementById("prix");
prix.addEventListener("keypress", function (e) {
    var result = verifier_prix(e);
    if (result == false) {
        alert("saisir un montant correct ");
    } else {
        removeAlert();
    }
});
function printcontent(el) {
    var restorpage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
}
