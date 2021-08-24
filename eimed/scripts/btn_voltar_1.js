$(function () {
    $("#btn-topo").click(function () {
        window.history.pushState("object or string", "Title", "http://localhost/healself/");
        location.reload();
    })
})