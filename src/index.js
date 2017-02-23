import { default as countdown } from './components/countdown';
import { default as menus } from './components/menus';
import { default as transitions } from './components/transitions';
import { default as rsvp } from './components/rsvp';
import { default as gallery } from './components/gallery';

(($) => {
  $(document).ready(() => {
    countdown('.countdown');
    menus();
    rsvp();
    gallery('.galeria');

    // Remove loading state and initialize the show!
    setTimeout(() => {
      $('.site-main').removeClass('loading');
      transitions();
      setTimeout(() => {
        $('.overlay').remove();
      }, 1000);
    }, 1000);
  });
})(window.jQuery);
