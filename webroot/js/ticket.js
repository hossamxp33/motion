
function setRate(responseId,userId,ticketId){
    $.ajax({
        url: `http://192.168.1.42/newcodesroots1/api/Responses/getrate/${responseId}/${userId}/${ticketId}.json`,
        type: 'GET',
        accept: 'application/json',
        success: function (result) {
            for(var i =0; i<result.data.length;i++){
                $('#star1').starrr({
                    rating:result.data[0].rate,
                    change: function (e, value) {
                        if (value) {
                            $('.your-choice-was').show();
                            localStorage.setItem('rate-value', value)
                            $('.choice').text(value);
                        } else {
                            $('.your-choice-was').hide();
                        }
                    }
                });
            }
            
        }
    })  
}
setRate(1,1,1);
$('.starrr').on('click', function () {
    $.ajax({
        url: `http://192.168.1.42/newcodesroots1/api/Responses/edit/${$(this).attr('comment-id')}.json`,
        type: 'POST',
        data: {
            rate: localStorage.getItem('rate-value')
        },
        accept: 'application/json',
        success: function (result) {
            console.log(result)
        }
    })
})
