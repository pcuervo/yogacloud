<?php get_header(); the_post();  ?>

	<article class="[ main-banner ][ box-btn ]" style="background-size: cover; background-image: url(<?php echo THEMEPATH; ?>images/photo-1456426531648-850ec2f5a462.jpg)">
		<div class="[ gradient-linear-opacity ]">
			<div class="[ container ]">
				<div class="[ row ]">
					<div class="[ col s12 ][ white-text text-center ]">
						<h1 class="[ padding-sides ]">Todos los productos</h1>
					</div>
				</div>
			</div>
		</div>
	</article>

	<article>
		<div class="[ container ]">
			<!-- Dropdown Trigger -->
			<a class="dropdown-button btn [ width---100 ][ block ]" href="#" data-activates="dropdown1">
				Todos
				<img class="[ middle inline-block ]" src="<?php echo THEMEPATH; ?>icons/download.png" alt="download image">
			</a>
			<!-- Dropdown Structure -->
			<ul id="dropdown1" class="dropdown-content">
				<li><a href="#!">one</a></li>
				<li><a href="#!">two</a></li>
				<li class="divider"></li>
				<li><a href="#!">three</a></li>
			</ul>
		</div>
	</article>

	<section class="[ container ][ text-center ]">
		<article class="[ box-btn--middle ]">
			<div class="[ card-image ][ relative ]">
				<div style="height: 322px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/tienda1.png)">
					<div class="[ gradient-linear-opacity--light-2 ][ width---100 height---100 ]">
						<span class="[ title-image ][ width---100 ]">Título del producto</span>
					</div>
				</div>
			</div>
			<div class="[ relative ][ bottom--22 ][ text-center ]">
				<a class="[ btn btn-rounded ][ waves-effect waves-light ]">comprar - $900</a>
			</div>
		</article>
		<article class="[ box-btn--middle ]">
			<div class="[ card-image ][ relative ]">
				<div style="height: 322px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/tienda2.png)">
					<div class="[ gradient-linear-opacity--light-2 ][ width---100 height---100 ]">
						<span class="[ title-image ][ width---100 ]">Título del producto</span>
					</div>
				</div>
			</div>
			<div class="[ relative ][ bottom--22 ][ text-center ]">
				<a class="[ btn btn-rounded ][ waves-effect waves-light ]">comprar - $900</a>
			</div>
		</article>
		<article class="[ box-btn--middle ]">
			<div class="[ card-image ][ relative ]">
				<div style="height: 322px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/tienda3.png)">
					<div class="[ gradient-linear-opacity--light-2 ][ width---100 height---100 ]">
						<span class="[ title-image ][ width---100 ]">Título del producto</span>
					</div>
				</div>
			</div>
			<div class="[ relative ][ bottom--22 ][ text-center ]">
				<a class="[ btn btn-rounded ][ waves-effect waves-light ]">comprar - $900</a>
			</div>
		</article>
		<article class="[ box-btn--middle ]">
			<div class="[ card-image ][ relative ]">
				<div style="height: 322px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/tienda4.png)">
					<div class="[ gradient-linear-opacity--light-2 ][ width---100 height---100 ]">
						<span class="[ title-image ][ width---100 ]">Título del producto</span>
					</div>
				</div>
			</div>
			<div class="[ relative ][ bottom--22 ][ text-center ]">
				<a class="[ btn btn-rounded ][ waves-effect waves-light ]">comprar - $900</a>
			</div>
		</article>
		<article class="[ box-btn--middle ]">
			<div class="[ card-image ][ relative ]">
				<div style="height: 322px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/tienda1.png)">
					<div class="[ gradient-linear-opacity--light-2 ][ width---100 height---100 ]">
						<span class="[ title-image ][ width---100 ]">Título del producto</span>
					</div>
				</div>
			</div>
			<div class="[ relative ][ bottom--22 ][ text-center ]">
				<a class="[ btn btn-rounded ][ waves-effect waves-light ]">comprar - $900</a>
			</div>
		</article>
		<article class="[ box-btn--middle ]">
			<div class="[ card-image ][ relative ]">
				<div style="height: 322px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/tienda2.png)">
					<div class="[ gradient-linear-opacity--light-2 ][ width---100 height---100 ]">
						<span class="[ title-image ][ width---100 ]">Título del producto</span>
					</div>
				</div>
			</div>
			<div class="[ relative ][ bottom--22 ][ text-center ]">
				<a class="[ btn btn-rounded ][ waves-effect waves-light ]">comprar - $900</a>
			</div>
		</article>
		<ul class="pagination [ text-center ]">
			<li class="disabled"><a href="#!">icono</a></li>
			<li class="active"><a href="#!">1</a></li>
			<li class="waves-effect"><a href="#!">2</a></li>
			<li class="waves-effect"><a href="#!">3</a></li>
			<li class="waves-effect"><a href="#!">4</a></li>
			<li class="waves-effect"><a href="#!">5</a></li>
			<li class="waves-effect"><a href="#!">icono</a></li>
		</ul>
	</section>



<?php get_footer(); ?>