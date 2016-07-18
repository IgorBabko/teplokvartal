(function() {
  $(function() {
    $('.slick-carousel').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000
    });
    if (($('#desc, #content')).length) {
      CKEDITOR.config.language = 'ru';
      CKEDITOR.replace('desc', {
        height: 300
      });
      CKEDITOR.replace('content', {
        height: 700
      });
    }
    $('.fancybox').fancybox();
    $('.single-feature').hover(function() {
      var imgName;
      imgName = $(this).parent('a').attr('href');
      $('.tab-content .tab-pane').removeClass('active');
      return $('#' + imgName).addClass('active');
    });
    $(".alert-success").fadeTo(2000, 500).slideUp(500, function() {
      return $(this).alert('close');
    });
    $("input[name='width']").change(function(e) {
      var changePricesTableRequest, itemName, width;
      width = $(this).val();
      itemName = $(this).parent().siblings('name').text();
      return changePricesTableRequest = $.ajax({
        url: "/prices/" + itemName + "/" + width,
        method: "GET"
      });
    });
    $('.prices').magnificPopup({
      delegate: 'a',
      type: 'image',
      mainClass: 'mfp-img-mobile',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0, 1]
      },
      image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
      }
    });
  });

  $.goup();

  $("a.fancy-img").fancyboxPlus({
    'transitionIn': 'elastic',
    'transitionOut': 'elastic',
    'speedIn': 600,
    'speedOut': 200,
    'overlayShow': false
  });

}).call(this);

//# sourceMappingURL=app.js.map
