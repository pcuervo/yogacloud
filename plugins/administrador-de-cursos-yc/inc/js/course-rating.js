var $=jQuery.noConflict();

$(window).ready(function(){
    $('.rating').addRating({
        'icon':         'favorite',
        'fieldName':    'courseRating',
        'fieldId':      'courseRatingId',
    });

    $('.rating i').click( function(){
        saveRating( $('#courseRatingId').val(), $('.rating').data('curso') )
    });
});

function saveRating( rating, idCurso ){
    $.post(
        ajax_url,
        {
            course_id:  idCurso,
            rating:     rating,
            action:     'save_user_rating'
        },
        function( response ){
            $('.rating').empty();
            $('.rating').html('<p>[DEFINIR COPY O ACCIÓN]</p>');
            console.log( response );
        }
    );
}