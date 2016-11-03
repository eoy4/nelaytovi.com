import { default as moment } from 'moment';

export function countdown(el) {
  const $ = window.jQuery || {};

  const $countdown = $(el);

  if (!$countdown.length) {
    return false;
  }

  if (!$countdown.find('.box.seconds').length) {
    $countdown.append($('<div>').addClass('box seconds'));
  }
  if (!$countdown.find('.box.minutes').length) {
    $countdown.find('.box.seconds').before($('<div>').addClass('box minutes'));
  }
  if (!$countdown.find('.box.hours').length) {
    $countdown.find('.box.minutes').before($('<div>').addClass('box hours'));
  }
  if (!$countdown.find('.box.days').length) {
    $countdown.find('.box.hours').before($('<div>').addClass('box days'));
  }

  const $days = $countdown.find('.box.days');
  const $hours = $countdown.find('.box.hours');
  const $minutes = $countdown.find('.box.minutes');
  const $seconds = $countdown.find('.box.seconds');

  const interval = setInterval(() => {
    const stamp = moment();
    const then = moment('2017/03/18 18:30:00', 'YYYY/MM/DD HH:mm:ss');
    const d = Math.floor(then.diff(stamp, 'seconds') / 60 / 60 / 24);
    const h = Math.floor((then.diff(stamp, 'seconds') / 60 / 60) - (d * 24));
    const m = Math.floor((then.diff(stamp, 'seconds') / 60) - (h * 60) - (d * 24 * 60));
    const s = then.diff(stamp, 'seconds') - (d * 24 * 60 * 60) - (h * 60 * 60) - (m * 60);

    $days.html(`<p>${d}</p><p>D&iacute;as</p>`);
    $hours.html(`<p>${h}</p><p>Horas</p>`);
    $minutes.html(`<p>${m}</p><p>Minutos</p>`);
    $seconds.html(`<p>${s}</p><p>Segundos</p>`);
  }, 1000);

  return interval;
}

export default countdown;
