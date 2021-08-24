$(function () {
    $("#btn-topo").click(function () {
        window.history.pushState("object or string", "Title", "alimentacao");
        location.reload();
    })


})