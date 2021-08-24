$(function(){
    $("#btn-adicionar").click(function () {
        window.history.pushState("object or string", "Title", "adicionar");
        location.reload();
    })

})