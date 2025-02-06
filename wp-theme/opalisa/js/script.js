jQuery(document).ready(function ($) {

  //SELECT
  $('.select-block select').niceSelect();

  //faq
  $(function() {
    $(".accordion > .accordion-item.is-active").children(".accordion-panel").slideDown();
    $(document).on('click', '.accordion > .accordion-item .accordion-thumb', function (e){
      $(this).parent('.accordion-item').siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
      $(this).parent('.accordion-item').toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
    })
  });

  //filter
  $(document).on('click', '.home-banner .bottom ul li a', function (e){
    e.preventDefault();
    $(this).closest('li').toggleClass('is-active');
  })

});