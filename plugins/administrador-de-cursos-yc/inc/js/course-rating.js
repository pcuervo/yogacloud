var $=jQuery.noConflict();

$(window).ready(function(){
    $('.rating').addRating({
        'icon':         'favorite',
        'fieldName':    'courseRating',
        'fieldId':      'courseRatingId',
    });
});

