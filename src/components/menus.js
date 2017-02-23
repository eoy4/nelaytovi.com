export function menus() {
  const $ = window.jQuery || {};

  const $menu = $('.hamburger-menu');

  const toggleMenu = (e) => {
    e.preventDefault();
    $menu.toggleClass('open');
  };

  const closeMenu = () => {
    $menu.removeClass('open');
  };

  const scrollToAnchor = (e) => {
    const href = $(e.target).attr('href');
    if (!href || href === '#') {
      return true;
    }

    e.preventDefault();

    closeMenu();

    const $target = $(`a[name=${href.substring(1)}]`);

    if (!$target.length) {
      return false;
    }

    const anchorTop = $target.offset().top;
    $('.parallax, body').animate({ scrollTop: anchorTop }, 1000);
    return true;
  };

  $('a[href*=#]').on('click', scrollToAnchor);

  $('.hamburger-menu-button').off('click').on('click', toggleMenu);
}

export default menus;
