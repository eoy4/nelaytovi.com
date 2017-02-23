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
  <a name="inicio"></a>
  <main id="main" class="site-main loading top-content" role="main">
    <div class="top-navigation hamburger-menu visible-xs-block">
      <div class="container">
        <a class='hamburger-menu-button' href="#menu">
          <i class="glyphicon glyphicon-menu-hamburger"></i>
        </a>
        <nav>
          <ul>
            <li><a href="#inicio">Inicio</a></li>
            <li><a href="#rsvpArea">RSVP</a></li>
            <li><a href="#galeria">Galer&iacute;a</a></li>
            <li><a href="#eventos">Eventos</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="parallax">
      <div class="parallax-layer parallax-layer-back photo">
        <div class="image-holder">
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/portada.jpg" alt="">
        </div>
      </div>
      <div class="parallax-layer parallax-layer-base">
        <h1 class="text-center page-top"></h1>
        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/arrow.png" class="arrow loading">
        <div class="top-navigation">
          <div class="row">
            <div class="col-xs-12">
              <div class="container">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/beourguest.png" alt="Be Our Guest">
                <nav class='hidden-xs'>
                  <ul>
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#rsvpArea">RSVP</a></li>
                    <li><a href="#galeria">Galer&iacute;a</a></li>
                    <li><a href="#eventos">Eventos</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="content">
          <div class="countdown">
            <a name="countdown"></a>
            <div class="container countdown-container">
              <p class="text-center faltan loading">Faltan</p>
              <div class="img-container loading">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/bell03.gif" class="bell-animation"/>
              </div>
              <div class="box loading days"></div>
              <div class="box loading hours"></div>
              <div class="box loading minutes"></div>
              <div class="box loading seconds"></div>
              <p class="text-center end-text loading">para nuestra boda!</p>
            </div>
          </div>
          <div class="rsvp loading">
            <a name="rsvp"></a>
            <div class="container">
              <h2>RSVP</h2>
              <img src="<?php echo get_stylesheet_directory_uri() ?>/images/invitaciones2.png" class="invitations"/>
              <div class="rsvp-form-container">
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
        </div>
      </div>
      <div class="parallax-layer parallax-layer-top site-logo">
        <div class="overlay"></div>
        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/nelaytovi.png" class="logo" alt="Nela y Tovi">
      </div>
    </div>
  </main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>
