// menu mobile
$('#js-btn-user').click(function(e){
    e.preventDefault();
    toggleUser();
})

$('#js-hide-user').on('click', function(event){
    event.preventDefault();
    console.log('entrar');
    toggleUser();
})


$('#js-btn-nav--user').on('click', function(event){
    event.preventDefault();
    console.log('salir');
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
        right: "-767"
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
    console.log('salir');
    toggleMenu();
})

$('#js-btn-user--nav').on('click', function(event){
    event.preventDefault();
    console.log('salir');
    toggleMenu();
    toggleUser();
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
        right: "-767"
    }, 700, function() {
        $( ".nav-mobile" ).addClass('js-hidden');
        $( "body" ).removeClass('overflow-hidden');
    });
}