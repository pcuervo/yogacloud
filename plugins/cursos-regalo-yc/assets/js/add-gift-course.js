var $=jQuery.noConflict();

$(window).ready(function(){
    $('.js-add-gift-course').click( function(){
        var courseId = $(this).data('course-id');
        addGiftToCheckout( courseId );
    }); 
});


function addGiftToCheckout( courseId ){
    $.post(
        ajax_url,
        {
            action:     'add_gift_to_cart',
            course_id:  courseId
        },
        function( checkout_url ){
            window.location.replace( checkout_url );
        }
    );
}