var $=jQuery.noConflict();

$(window).ready(function(){
    fetchAutoPlaySettings();
    $('#autoplay').change(function(){
        var has_autoplay = $(this).is(':checked');
        saveAutoplaySetting( has_autoplay );
    });
});

function saveAutoplaySetting( autoplay ){
    console.log( autoplay );
    $.post(
        ajax_url,
        {
            has_autoplay:   autoplay,
            action:         'save_user_autoplay_setting'
        },
        function( response ){
            console.log( response );
        }
    );
}

function fetchAutoPlaySettings(){
    $.post(
        ajax_url,
        {
            action:         'get_user_autoplay_setting'
        },
        function( autoplayVal ){
            if( parseInt( autoplayVal ) )  $('#autoplay').prop( 'checked', true );
        }
    );
}