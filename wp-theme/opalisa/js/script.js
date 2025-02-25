jQuery(document).ready(function ($) {

  //SELECT
  $('.select select').niceSelect();
  $('.select-block select').niceSelect();

	 $(document).ajaxComplete(function(){
 		$('.select select').niceSelect();
    });

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

  //+/-
  $(".btn-count-plus").click(function () {
    var e = $(this).parent().find("input");
    return e.val(parseInt(e.val()) + 1), e.change(), !1
  }), $(".btn-count-minus").click(function () {
    var e = $(this).parent().find("input"), t = parseInt(e.val()) - 1;
    return t = t < 1 ? 1 : t, e.val(t), e.change(), !1
  })

  //file
  $('input:file').change(function(){
    $this = $(this);
    $name = $this.val().replace('C:\\fakepath\\', '');
    $(this).closest('.input-wrap-file').find('.file-select').text($name).show();
    $(this).closest('.input-wrap-file').find('.h5').hide();
    $(this).closest('.input-wrap-file').find('.h6').hide();
    $(this).closest('.input-wrap-file').find('.img').hide();
    $(this).closest('.input-wrap-file').find('.delete-file').show();
  });

  //clear input
  $(document).on('click', '.delete-file', function (e){
    e.preventDefault();
    $(this).siblings('input').val('');
    $(this).closest('.input-wrap-file').find('.file-select').text('').hide();
    $(this).closest('.input-wrap-file').find('.h5').show();
    $(this).closest('.input-wrap-file').find('.h6').show();
    $(this).closest('.input-wrap-file').find('.img').show();
    $(this).closest('.input-wrap-file').find('.delete-file').hide();
  });


  //mask
  $('.cart-number').mask("0000 0000 0000 0000", {placeholder: "1234 1234 1234 1234"});
  $('.cart-date').mask("00/00", {placeholder: "MM/AA"});
  $('.cart-cvc').mask("000", {placeholder: "123"});

  $(".fancybox").fancybox({
    touch: false,
    autoFocus: false,
  });
});