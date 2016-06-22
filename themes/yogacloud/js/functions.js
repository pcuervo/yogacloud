// menu mobile
 $('#js-btn-nav').click(function(e){
    e.preventDefault();
    toggleMenu();
})

$('#js-hide-nav').on('click', function(event){
    event.preventDefault();
    console.log('entro');
    toggleMenu();
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