// Add your custom JS here.
/* CUSTOM JS */

AOS.init({
  duration: 1200,
  once: true,
});

(function($){
  $('body').on('show.bs.modal', function () {
    $('.sticky-top').css('margin-left', '-=0px');
  });

  $('body').on('hidden.bs.modal', function () {
    $('.sticky-top').css('margin-left', 'auto');
  });
})(jQuery);