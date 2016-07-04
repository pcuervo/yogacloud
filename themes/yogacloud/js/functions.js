// menu mobile
$('#js-btn-user').click(function(e){
    e.preventDefault();
    toggleUser();
})

$('#js-hide-user').on('click', function(event){
    event.preventDefault();
    toggleUser();
})


$('#js-btn-nav--user').on('click', function(event){
    event.preventDefault();
    toggleUser();
    toggleMenu();
})


function toggleUser(){
    if( $('.user-mobile').hasClass('js-hidden') ){
        $( ".user-mobile" ).animate({
            right: "0"
        }, 700, function() {
            $( ".user-mobile" ).removeClass('js-hidden');
            $( "body" ).addClass('overflow-hidden');
        });

        return;
    }

    $( ".user-mobile" ).animate({
        right: "-1000"
    }, 700, function() {
        $( ".user-mobile" ).addClass('js-hidden');
        $( "body" ).removeClass('overflow-hidden');
    });
}


$('#js-btn-nav').click(function(e){
    e.preventDefault();
    toggleMenu();
})

$('#js-hide-nav').on('click', function(event){
    event.preventDefault();
    toggleMenu();
})

$('#js-btn-user--nav').on('click', function(event){
    event.preventDefault();
    toggleMenu();
    toggleUser();
})

$('#cursos-nav').on('click', function(event){
    if($("#cursos").length > 0) {
        toggleMenu();
    }
})

function toggleMenu(){
    if( $('.nav-mobile').hasClass('js-hidden') ){
        $( ".nav-mobile" ).animate({
            right: "0"
        }, 700, function() {
            $( ".nav-mobile" ).removeClass('js-hidden');
            $( "body" ).addClass('overflow-hidden');
        });

        return;
    }

    $( ".nav-mobile" ).animate({
        right: "-1000"
    }, 700, function() {
        $( ".nav-mobile" ).addClass('js-hidden');
        $( "body" ).removeClass('overflow-hidden');
    });
}

//Search Nav

$('#title-search-nav').on('click', function(event){
    event.preventDefault();
    toggleSearch();
})

function toggleSearch(){
    if( $('#form-search-nav').hasClass('hidden') ){
        $( ".divider.divider-hidden" ).addClass('hidden');
        $( "#box-form" ).addClass('box-search');
        $( "#title-search-nav" ).animate({
            fontSize: 15,
        }, 500, function() {
            //Animated complete
        });
        $( "#form-search-nav" ).show("slow", function() {
            $( "#form-search-nav" ).removeClass('hidden');
        });
        return;
    }

    $( "#title-search-nav" ).animate({
        fontSize: 23
    }, 500, function() {
        //Animated complete
        $( ".divider.divider-hidden" ).removeClass('hidden');
        $( "#box-form" ).removeClass('box-search');

    });
    $( "#form-search-nav" ).hide("slow", function() {
        $( "#form-search-nav" ).addClass('hidden');
    });
}



// Videos

$('#play-button').on('click', function(event){
    event.preventDefault();
    videoPlayer();
})

function videoPlayer(){
    if( $('#background-video').hasClass('in-front') ){
        $( "#background-video" ).removeClass('in-front');
        $( "#background-video" ).addClass('hidden');
        $( "#video-whit-button" ).animate({
            'marginBottom': '30px'
        }, 500, function() {
            //Animated complete
        });
        $( "#play-button img" ).addClass('hidden');
        $("#video_player")[0].play(); //autoplay
    }
}

//Max height Video

function heightScreen(){
    if($("#play-button").length > 0) {
        var ventana_alto = $(window).height();

        var height_video =  ((ventana_alto - 64) + 'px'); //window height - height header
        console.log('Altura máxima video', height_video);
        $('.max-height-screen').css('max-height', height_video);

        var height_video_button =  (((ventana_alto - 64) - 70 ) + 'px'); //( window height - height header ) - button
        console.log('Altura máxima video con botón', height_video_button);
        $('.max-height-screen_button').css('max-height', height_video_button);

        var video_alto = $('video#video_player').height();
        console.log('Altura actual del video', video_alto + 'px');
    }
}


//Imagen cuadrada

function boxCard(){
    if($("#box-card").length > 0) {

        //image size
        var image_alto = $('.bg-image--rectangle').width();
        console.log('Tamaño imagen:', image_alto + 'px', '*',  image_alto + 'px');
        $('.bg-image--rectangle').css('height', image_alto + 'px');

        //Ellipsis text
        var ellipsis_alto = (((image_alto - 20) - 25 ) + 'px'); //(height imagen - padding-top ) - height button
        console.log('Tamaño ellipsis:', ellipsis_alto);
        $('.height-box-ellipsis').css('height', ellipsis_alto);

        var containerHeight = $(".text-ellipsis").height();
        var $text = $(".text-ellipsis p");

        while ( $text.outerHeight() > containerHeight ) {
                $text.text(function (index, text) {
                    return text.replace(/\W*\s(\S)*$/, '...');
               });
        }

    }
}

function sliderHeight(){
    var caption_height = $('.testimonials li.active .caption').height();
    var testimonial_height = (caption_height + 20);
    console.log('Alto slider:', testimonial_height + 'px');
    $('.height-testimonials').css('height', testimonial_height );
}