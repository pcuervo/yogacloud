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

//Icons SVG

function imgToSvg(){
    $('img.svg').each(function(){
        var $img = $(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        $.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = $(data).find('svg');

            // Add replaced image's ID to the new SVG
            if(typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a').removeAttr('width').removeAttr('height');

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');

    });
} //imgToSvg

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

//Ellipsis text

var containerHeight = $(".text-ellipsis").height();
var $text = $(".text-ellipsis p");

while ( $text.outerHeight() > containerHeight ) {
        $text.text(function (index, text) {
            return text.replace(/\W*\s(\S)*$/, '...');
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
        $( "#video-container" ).addClass('z-index-10');
        $( "#play-button img" ).addClass('hidden');
        $("#video_player")[0].play(); //autoplay
    }
}

//Max height Video
var ventana_alto = $(window).height();
var height_video =  ((ventana_alto - 64) + 'px'); //window height - height header
console.log(height_video);
var video_alto = $('video#video_player').height();
console.log(video_alto);
$('.max-height-screen').css('max-height', height_video);