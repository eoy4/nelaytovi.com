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
            <li><a href="#rsvpAnchor">RSVP</a></li>
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
                    <li><a href="#rsvpAnchor">RSVP</a></li>
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
              <p class="text-center faltan text-shadow loading">Faltan</p>
              <div class="img-container loading">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/bell03.gif" class="bell-animation"/>
              </div>
              <div class="box loading days"></div>
              <div class="box loading hours"></div>
              <div class="box loading minutes"></div>
              <div class="box loading seconds"></div>
              <p class="text-center end-text text-shadow loading">para nuestra boda!</p>
            </div>
          </div>
          <?php
          // Start the loop.
          while ( have_posts() ) : the_post();
          ?>
          <div class="rsvp loading <?php the_title(); ?>">
            <a name="rsvpAnchor"></a>
            <div class="container">
              <h2>RSVP</h2>
              <img src="<?php echo get_stylesheet_directory_uri() ?>/images/invitaciones2.png" class="invitations"/>
              <div class="rsvp-form-container">
              <?php
                // Include the page content template.
                get_template_part( 'template-parts/content', 'page-rsvp' );
              ?>
              </div>
            </div>
          </div>
          <?php
            // End of the loop.
          endwhile;
          ?>
          <div class="eventos loading">
            <a name="eventos"></a>
            <div class="container eventos-content">
              <div class="eventos-card">
                <h2 class="text-center text-shadow">Horarios de Eventos</h2>
                <div class="text-center">
                  <p class="text-shadow">Sábado 18 de marzo de 2017.</p>
                  <p class="text-shadow">
                    Ceremonia Religiosa:
                    <br>
                    Iglesia de Santa Ana Centro
                    <br>
                    6:30 pm
                  </p>
                
                  <p class="text-shadow">
                    Recepción:
                    <br>
                    Hotel Sheraton Escazú
                    <br>
                    Al terminar la ceremonia religiosa.
                  </p>
                
                  <p class="text-shadow">
                    Si ud desea hospedarse en el hotel después de la recepción,
                    <br>
                    favor mandar un correo a reservas@sheratoncr.com
                    <br>
                    Habrá descuentos para los invitados del evento.
                  </p>
                
                  <p class="text-shadow">
                    ¡Los esperamos!
                  </p>
                
                  <div class="chirulito"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="galeria loading">
            <a name="galeria"></a>
            <div class="container">
              <h2 class="text-center text-shadow">Galería</h2>
                <?php echo do_shortcode('[gallery ids="11,12,13,14,15,16,17,18,19,20,21,22,23,24"]'); ?>
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

<div class="gallery-overlay">
  <div class="gallery-image"></div>
  <a href="#" class="close-image"><i class="glyphicon glyphicon-remove"></i></a>
</div>

<?php get_footer(); ?>
