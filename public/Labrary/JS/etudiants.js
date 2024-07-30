//code js corresponde au dossier etudiants pour la verification de nom etudiant
// function verificationNom(e) {
//     var charcode = e.charCode;
//     if ((charcode > 64 && charcode < 91) || (charcode > 96 && charcode < 123)) {
//         return true;
//     } else {
//         e.preventDefault();
//         return false;
//     }
// }
// var nom = document.getElementById("nom");
// nom.addEventListener("keypress", function (e) {
//     var result = verificationNom(e);
//     if (result == false) {
//         alert("svp entre un nom correct");
//     } else {
//         this.removeAlert();
//     }
// });
// //fin code js pour verifier le nom
// //code js corresponde au dossier etudiants pour la verification de prenom etudiant
// var prenom = document.getElementById("prenom");
// prenom.addEventListener("keypress", function (e) {
//     var result = verificationNom(e);
//     if (result == false) {
//         alert("svp entre le prenom correct");
//     } else {
//         this.removeAlert();
//     }
// });
//fin code js pour verifier le  prenom
// //code js corresponde au dossier etudiants pour la verification de numero telephone etudiant
// function verifier_phone() {
//     var tel = document.getElementById("telephone").value;
//     var phone_rgx = /^(2|3|4)[0-9]{7}$/;
//     if (!tel.match(phone_rgx)) {
//         alert(
//             "le numero du telephone doit comporter exactement 8 chifre est il commence par 1 ou 2 ou 3"
//         );
//         return false;
//     } else {
//         return true;
//     }
// }
// function verifier_phone_parent() {
//     var telp = document.getElementById("telephonep").value;
//     var phonep_rgx = /^(2|3|4)[0-9]{7}$/;
//     if (!telp.match(phonep_rgx)) {
//         alert(
//             "le numero du telephone parent doit comporter exactement 8 chifre est il commence par 1 ou 2 ou 3"
//         );
//         return false;
//     } else {
//         return true;
//     }
// }
// //fin code verifier le numero telephone
// // function handleData()
// //  {
// //     var form_data = new FormData(document.querySelector("form"));

// //     if (!form_data.has("mois_retard[]")) {
// //         document.getElementById("chk_option_error").style.visibility =
// //             "visible";
// //         return false;
// //     } else {

// //         return true;
// //      }
// // }
// // function qui verifie les numero des  telephones
// function verifier_numero() {
//     if (!verifier_phone()) {
//         return false;
//     } else if (!verifier_phone_parent()) {
//         return false;

//     } else {
//         return true;
//     }
// }
