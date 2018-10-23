$('.collapse-sideMenu').click(function(){
    $('.header').toggleClass('header-clicked')
    $('.sideMenu').toggleClass('sideMenu-clicked');
    if($('.sideMenu').parent().hasClass('col-sm-2')){
        $('.sideMenu').parent().removeClass('col-sm-2').addClass('col-sm-1')
        $('.header').parents('.col-sm-10').removeClass('col-sm-10').addClass('col-sm-11');
        $('nav li').css('padding:','10px 25px;')
    }else{
        $('.sideMenu').parent().removeClass('col-sm-1').addClass('col-sm-2')
        $('.header').parents('.col-sm-11').removeClass('col-sm-11').addClass('col-sm-10')
        $('nav li').css('padding:','10px 30px;')
    }
    
})