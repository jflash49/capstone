function animation(){

    $('#pic').hover(
        function(){
            $('#inside-pic').stop(true, true).animate({
                'bottom': '+=400'
            }, 800);
        },

        function(){
            $('#inside-pic').stop(true, true).animate({
                'bottom': '-=400'
            }, 200);
        }
        );

}

$(document).ready(function() {
    setTimeout('animation()',400);

});


