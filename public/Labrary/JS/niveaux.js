// //code js corresponde tous les dossier pour la confirmation avant suppression
// function confirmation() {
//     confirm("esque vous ete sur ? ");
// }
// //fin code js pour la confirmation avant le suprimer
// //code js corresponde au dossier niveau pour la validation de prix
// function verifier_prix(e) {
//     var charcod = e.charCode;
//     if (charcod > 47 && charcod < 58) {
//         return true;
//     } else {
//         e.preventDefault();
//         return false;
//     }
// }
// var prix = document.getElementById("prix");
// prix.addEventListener("keypress", function (e) {
//     var result = verifier_prix(e);
//     if (result == false) {
//         alert("saisir un prix correct ");
//     } else {
//         removeAlert();
//     }
// });
// // fin code js pour la validation de prix
// //code js corresponde au dossier niveau pour verifie le nom de niveau
// function verifier_nom_niveau() {
//     niveau = document.getElementById("niveau").value;
//     niveau_rgx = /^[0-9][A-Z]*$/;
//     if (!niveau.match(niveau_rgx)) {
//         alert(
//             "le niveau doit commencer par un chifre est preceder par des Lettres MAJUSCULE"
//         );
//         return false;
//     } else {
//         return true;
//     }
// }
// // essay pour prix avec rgx
// // function verifier_prix() {
// //     var prix = document.getElementById("prix").value;
// //     prix_rgx = /^[0-9]*$/;
// //     if (!prix.match(prix_rgx)) {
// //         return false;
// //     } else {
// //         return true;
// //     }
// // }
// // var prix = document.getElementById("prix");
// // prix.addEventListener("keypress", function () {
// //     var result = verifier_prix();
// //     if (result == false) {
// //         alert("prix doit etre un  nombre");
// //     } else {
// //         this.removeAlert();
// //     }
// // });
