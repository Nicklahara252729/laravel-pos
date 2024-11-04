/**
 * import component attribute
 */
import { attributeName } from './components/attribute/attribute-name.js';

/**
 * defined component
 */
const rightSideNav = $(`.${attributeName()[0]['rightSideNav']}`);
const imgZoom = $(`.${attributeName()[0]['imgZoom']}`);
const btnTab = $(`.${attributeName()[0]['btnTab']}`);
const floatEnd = $(`.${attributeName()[0]['floatEnd']}`);

/**
 * on scroll animation
 */
!(function (e) {
  'use strict';
  e(`${rightSideNav.selector} a`).on('click', function (t) {
    var a = e(this);
    e('html, body')
      .stop()
      .animate({ scrollTop: e(a.attr('href')).offset().top - 94 }, 1000, 'easeIn'),
      t.preventDefault();
  });
})(jQuery);

/**
 * iamge zoom
 */
imgZoom.magnificPopup({
  type: 'image',
});

/**
 * tab button animation
 */
btnTab.on('click', function () {
  const tabName = $(this).data('tab');
  $(`.${tabName}-tab`).toggle('fast');

  // Toggle arrow icon based on tab visibility
  const arrowIcon = $(this).find(floatEnd.selector);
  arrowIcon.toggleClass('mdi-chevron-up mdi-chevron-down');
});
