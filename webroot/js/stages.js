//editor Plugin
$("#txtEditor").Editor();
//Notification Plugin
var myImg = "https://unsplash.it/600/600?image=777";
options = {
    title: $('#projectName').text(),
    options: {
        body: $('.completed').parent().siblings('.stage-title').append(" / ").text(),
        icon: myImg,
        lang: 'en-US',
        onClick: ''
    }
}
$("#easyNotify").easyNotify(options);