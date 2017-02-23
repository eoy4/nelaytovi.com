export function rsvp() {
  const $ = window.jQuery || {};

  const correctCopy = (parent = $('article.page')) => {
    // Correct RSVP text which is not editable in wordpress admin....
    if (!parent.length) { return false; }
    $(parent).find('label[for="firstName"]').text('Nombre:');
    $(parent).find('label[for="lastName"]').text('Dos Apellidos:');
    $(parent).find('form#rsvp input[type=submit]').attr('value', 'Enviar');
    $(parent).html($(parent).html().replace(/fiesta/g, '<span class="nobreak">f&#8202;iesta</span>'));
    $(parent).html($(parent).html().replace(/Yes/g, 'Sí'));
    $(parent).html($(parent).html().replace(/Hi (.*)!/g, '¡Hola, $1!'));
    $(parent).html($(parent).html().replace(/Welcome back (.*)!/g, '¡Bienvenido de nuevo, $1!'));
    $(parent).html($(parent).html().replace(/Email Address/g, 'Correo Electrónico'));
    $(parent).html($(parent).html().replace(/The following people .*well/g,
      'Las siguientes personas están asociadas con su nombre. Usted puede RSVP por ellas a continuación, si lo desea'));
    $(parent).html($(parent).html().replace(/Will (.*) be attending\?/g, '¿$1 va a asistir a la boda?'));
    $(parent).html($(parent).html().replace(/Hi (.*) it looks like .*\?/g,
      'Hola, $1. Parece que usted ya contestó a la invitación. ¿Desea editar su respuesta?'));

    // Errors
    $(parent).html($(parent).html().replace(/A first and last name must be specified/g,
      'Por favor ponga su nombre y apellidos.'));
    $(parent).html($(parent).html().replace(/We could not find an .*you\?/g,
      'No pudimos encontrar el nombre exacto, pero ¿es alguno de estos su nombre?'));
    $(parent).html($(parent).html().replace(/We were unable to find anyone with a name of (.*)/g,
      'No pudimos encontrar a nadie con el nombre $1'));
    return true;
  };

  correctCopy();

  const submitHandler = (e) => {
    e.preventDefault();
    e.stopPropagation();

    const data = $(e.target).serialize();

    $.ajax({
      url: $(e.target).attr('action'),
      type: 'POST',
      data,
      success: (response) => {
        const $rsvpContent = $(response).find('article.page');
        if (!$rsvpContent.find('input[name=firstName]').length) {
          $rsvpContent.find('form').addClass('full-form');
        }
        correctCopy($rsvpContent);
        $('.rsvp-form-container').html($rsvpContent);
        $('.rsvp-form-container form').off('submit');
        $('.rsvp-form-container form').on('submit', submitHandler);
      }
    });

    return false;
  };

  setTimeout(() => {
    $('.rsvp-form-container form').off('submit');
    $('.rsvp-form-container form').on('submit', submitHandler);
  }, 1000);
}

export default rsvp;
