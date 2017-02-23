const $ = window.jQuery || {};

// Defines the animations triggers
const triggers = [
  {
    name: 'arrow',
    element: '.parallax-layer-base',
    position: null,
    offset: -10,
    func: () => {
      $('img.arrow').removeClass('loading');
    }
  },
  {
    name: 'countdown',
    element: '.countdown',
    position: null,
    offset: 400,
    func: () => {
      setTimeout(() => {
        $('.countdown .faltan').removeClass('loading');
      }, 0);
      setTimeout(() => {
        $('.countdown .img-container').removeClass('loading');
      }, 0);
      setTimeout(() => {
        $('.countdown .box.hours').removeClass('loading');
      }, 500);
      setTimeout(() => {
        $('.countdown .box.seconds').removeClass('loading');
      }, 600);
      setTimeout(() => {
        $('.countdown .box.minutes').removeClass('loading');
      }, 550);
      setTimeout(() => {
        $('.countdown .box.days').removeClass('loading');
      }, 620);
      setTimeout(() => {
        $('.countdown .end-text').removeClass('loading');
      }, 1000);
    }
  },
  {
    name: 'rsvp',
    element: '.rsvp',
    position: null,
    offset: 300,
    func: () => {
      $('.rsvp').removeClass('loading');
    }
  },
  {
    name: 'eventos',
    element: '.eventos',
    position: null,
    offset: 300,
    func: () => {
      $('.eventos').removeClass('loading');
    }
  },
  {
    name: 'galeria',
    element: '.galeria',
    position: null,
    offset: 300,
    func: () => {
      $('.galeria .gallery figure').each((index, element) => {
        $(element).css({ transitionDelay: `${index * 0.1}s` });
      });
      $('.galeria').removeClass('loading');
    }
  },
];

// Holds the emmitted triggers names
const emittedTriggers = [];

// Calculate the triggers positions and offsets, once initially and every time window is resized
function calculatePositions() {
  if (triggers) {
    triggers.forEach((trigger, index) => {
      const $element = $(trigger.element);
      if ($element.length) {
        triggers[index].position = $element.offset().top - triggers[index].offset;
      }
    });
  }
}

// Receives scroll position and dispatches the triggers that are within boundaries
function emmitTriggers(scrollPos) {
  return triggers && triggers.reduce((prev, curr) => {
    if (scrollPos >= curr.position) {
      if (emittedTriggers.indexOf(curr.name) === -1) {
        emittedTriggers.push(curr.name);
      }
      return [].concat(prev, [curr.name]);
    }
    return prev;
  }, []);
}

export default function () {
  calculatePositions();

  $(window).on('resize', () => {
    calculatePositions();
  });

  // Calls emmitTriggers and receives newly emmitted triggers. It then calls the functions
  // of each trigger that was emmitted in this cycle.
  const intervalFunc = () => {
    let scrollPos = $(window).scrollTop();
    if (!scrollPos) {
      scrollPos = $('.parallax').scrollTop();
    }
    const newTriggers = emmitTriggers(scrollPos);
    if (newTriggers.length) {
      newTriggers.forEach((emittedTrigger) => {
        const trigger = triggers.reduce((prev, curr) => {
          if (!prev && (curr.name === emittedTrigger)) {
            return curr;
          }
          return prev || null;
        }, null);
        if (trigger && trigger.func) {
          trigger.func();
          trigger.func = null;
        }
      });
    }
  };

  // Set an interval every 0.5s to check for emmitted triggers. When all triggers have been
  // emmitted, the interval automatically clears.
  const interval = setInterval(() => {
    intervalFunc();
    if (triggers.length === emittedTriggers.length) {
      clearInterval(interval);
    }
  }, 500);
}
