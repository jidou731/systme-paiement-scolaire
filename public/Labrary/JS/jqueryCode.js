// printer les recus
$(document).ready(function () {
    $("#btnPrint").on("click", function () {
        $("#btnPrint").hide();
        $("#annuler").hide();
        var css = "@page { size:    a4; }",
            head = document.head || document.getElementsByTagName("head")[0],
            style = document.createElement("style");
        style.type = "text/css";
        style.media = "print";
        if (style.styleSheet) {
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }
        head.appendChild(style);
        window.print();
    });
});
//code de popup de mois
a = $("#div_mois").html();
$(".bt").click(function () {
    $("#div_mois").show();
    $("#div_mois").html($(this).next().html() + a);
    $("#fermer").click(function () {
        $("#div_mois").hide(400);
    });
});
// $(document).ready(function () {
//     $("#tab").DataTable({
//         scrolly: "5px",
//         scrollCollapse: true,
//         paging: true,
//     });
// });
