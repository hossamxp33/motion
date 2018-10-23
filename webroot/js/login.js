$('.login-info,.login-form').hide();
$('form').css('width', $('.login-register-form').width())
$('.login-button').on('click', function () {
    $('.login-register-form').addClass('transform');
    $('.register-info,.register-form').hide();
    $('.login-info,.login-form').fadeIn(400);
})


if ($(window).width() >= 768) {
    $('.register-button').on('click', function () {
        $('.login-register-form').removeClass('transform');
        $('.login-info,.login-form').hide();
        $('.register-info,.register-form').fadeIn(400);
    })
}else{
    $('.register-button').on('click', function () {
        $('.login-info,.login-form').hide();
        $('.register-info,.register-form').fadeIn(400);
    })
}
