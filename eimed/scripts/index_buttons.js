$(function () {
    $('#btn-login-main').click(function () {
        var currentURL = $(location).attr('href');
        window.history.pushState("object or string", "Title", "login");
        location.reload()
    })
    $('#btn-perfil-main').click(function () {
        var currentURL = $(location).attr('href');
        window.history.pushState("object or string", "Title", "perfil");
        location.reload()
    })
})