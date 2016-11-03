<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary">
  <main id="main" class="site-main loading top-content" role="main">
    <div class="top-navigation hamburger-menu visible-xs-block">
      <div class="container">
        <a class='hamburger-menu-button' href="#menu">
          <i class="glyphicon glyphicon-menu-hamburger"></i>
        </a>
        <nav>
          <ul>
            <li><a href="#inicio">Inicio</a></li>
            <li><a href="#rsvp">RSVP</a></li>
            <li><a href="#galeria">Galer&iacute;a</a></li>
            <li><a href="#eventos">Eventos</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="paralax">
      <div class="paralax-layer paralax-layer-back photo">
        <div class="image-holder">
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/portada.jpg" alt="">
        </div>
      </div>
      <div class="paralax-layer paralax-layer-base">
        <h1 class="text-center"></h1>
        <div class="top-navigation">
          <div class="row">
            <div class="col-xs-12">
              <div class="container">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/beourguest.png" alt="Be Our Guest">
                <nav>
                  <ul>
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#rsvp">RSVP</a></li>
                    <li><a href="#galeria">Galer&iacute;a</a></li>
                    <li><a href="#eventos">Eventos</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="content">
          <div class="container">
            <div class="countdown">
              <p class="text-center">Faltan</p>
              <div class="box days"></div>
              <div class="box hours"></div>
              <div class="box minutes"></div>
              <div class="box seconds"></div>
              <p></p>
            </div>
          
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();
              // Include the page content template.
              get_template_part( 'template-parts/content', 'page-rsvp' );
              // End of the loop.
            endwhile;
            ?>
          </div>
        </div>
      </div>
      <div class="paralax-layer paralax-layer-top site-logo">
        <div class="overlay"></div>
        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/nelaytovi.png" alt="Nela y Tovi">
      </div>
    </div>
  </main><!-- .site-main -->

</div><!-- .content-area -->

<script>
(function($) {
  var $menu = $('.hamburger-menu');
  var toggleMenu = function () {
    $menu.toggleClass('open');
  }

  var closeMenu = function () {
    $menu.removeClass('open');
  }

  var scrollToAnchor = function (e) {
    e.preventDefault();
    closeMenu();
    var $target = $($(this).attr('href').trim('#'));
    if (!$target.length) return false;

    var anchorTop = $target.offset().top;
    $('.paralax').animate({scrollTop: anchorTop}, 1000);
  }

  $('a[href*=#]').on('click', scrollToAnchor);

  $('.hamburger-menu-button').off('click').on('click', toggleMenu);

  $(document).ready(function() {
    setTimeout(function() {
      $('.site-main').removeClass('loading');
      setTimeout(function() {
        $('.overlay').remove();
      }, 1000);
    }, 1000);
  });
})(jQuery);
</script>

<?php get_footer(); ?>
