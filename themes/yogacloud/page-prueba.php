<?php get_header(); the_post();  ?>






<div id="slideshow-1">
    <!-- <p>
        <a href="#" class="cycle-prev">&laquo; prev</a> | <a href="#" class="cycle-next">next &raquo;</a>
        <span class="custom-caption"></span>
    </p> -->
    <div id="cycle-1" class="cycle-slideshow"
        data-cycle-slides="> div"
        data-cycle-timeout="0"
        data-cycle-prev="#slideshow-1 .cycle-prev"
        data-cycle-next="#slideshow-1 .cycle-next"
        data-cycle-caption="#slideshow-1 .custom-caption"
        data-cycle-caption-template="Slide {{slideNum}} of {{slideCount}}"
        data-cycle-fx="tileBlind"
        >
        <div><img src="http://malsup.github.io/images/beach1.jpg" width=500 height=500></div>
        <div><img src="http://malsup.github.io/images/beach2.jpg" width=500 height=500></div>
        <div><img src="http://malsup.github.io/images/beach3.jpg" width=500 height=500></div>
        <div><img src="http://malsup.github.io/images/beach4.jpg" width=500 height=500></div>
        <div><img src="http://malsup.github.io/images/beach5.jpg" width=500 height=500></div>
        <div><img src="http://malsup.github.io/images/beach6.jpg" width=500 height=500></div>
        <div><img src="http://malsup.github.io/images/beach7.jpg" width=500 height=500></div>
        <div><img src="http://malsup.github.io/images/beach8.jpg" width=500 height=500></div>
        <div><img src="http://malsup.github.io/images/beach9.jpg" width=500 height=500></div>
    </div>
</div>

<div id="slideshow-2">
    <div id="cycle-2" class="cycle-slideshow"
        data-cycle-slides="> div"
        data-cycle-timeout="0"
        data-cycle-prev="#slideshow-2 .cycle-prev"
        data-cycle-next="#slideshow-2 .cycle-next"
        data-cycle-caption="#slideshow-2 .custom-caption"
        data-cycle-caption-template="Slide {{slideNum}} of {{slideCount}}"
        data-cycle-fx="carousel"
        data-cycle-carousel-visible="5"
        data-cycle-carousel-fluid=true
        data-allow-wrap="false"
        >
        <div><img src="http://malsup.github.io/images/beach1.jpg" width=100 height=100></div>
        <div><img src="http://malsup.github.io/images/beach2.jpg" width=100 height=100></div>
        <div><img src="http://malsup.github.io/images/beach3.jpg" width=100 height=100></div>
        <div><img src="http://malsup.github.io/images/beach4.jpg" width=100 height=100></div>
        <div><img src="http://malsup.github.io/images/beach5.jpg" width=100 height=100></div>
        <div><img src="http://malsup.github.io/images/beach6.jpg" width=100 height=100></div>
        <div><img src="http://malsup.github.io/images/beach7.jpg" width=100 height=100></div>
        <div><img src="http://malsup.github.io/images/beach8.jpg" width=100 height=100></div>
        <div><img src="http://malsup.github.io/images/beach9.jpg" width=100 height=100></div>
    </div>

<!--     <p>
        <a href="#" class="cycle-prev">&laquo; prev</a> | <a href="#" class="cycle-next">next &raquo;</a>
        <span class="custom-caption"></span>
    </p> -->
</div>

<?php get_footer(); ?>