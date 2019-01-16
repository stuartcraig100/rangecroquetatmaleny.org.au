jQuery(document).ready(function ($) {

  var ProductGallery = function ($target) {
    this.$target = $target;
    this.$images = $target.find('.woocommerce-product-gallery__image');

    if (this.$target.hasClass('jupiterx-product-gallery-static')) {
      this.initZoom();
    } else {
      this.createSlickThumbnailsSlider();
      this.repositionDirectionNav();
    }

    this.preventSmoothScroll()
  }

  ProductGallery.prototype.createSlickThumbnailsSlider = function () {
    var $gallery = this.$target,
      options = {
        infinite: false,
        draggable: false,
        slidesToShow: 7,
        slidesToScroll: 1,
        prevArrow: '<button class="slick-prev" aria-label="Prev" type="button"><svg fill="#333333" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7.2px" height="12px" viewBox="0 0 7.2 12" style="enable-background:new 0 0 7.2 12;" xml:space="preserve"><path class="st0" d="M2.4,6l4.5-4.3c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0l-5.2,5C0.1,5.5,0,5.7,0,6s0.1,0.5,0.3,0.7l5.2,5	C5.7,11.9,6,12,6.2,12c0.3,0,0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L2.4,6z"/></svg></button>',
        nextArrow: '<button class="slick-next" aria-label="Next" type="button"><svg fill="#333333" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7.2px" height="12px" viewBox="0 0 7.2 12" style="enable-background:new 0 0 7.2 12;" xml:space="preserve"><path class="st0" d="M4.8,6l-4.5,4.3c-0.4,0.4-0.4,1,0,1.4c0.4,0.4,1,0.4,1.4,0l5.2-5C7.1,6.5,7.2,6.3,7.2,6S7.1,5.5,6.9,5.3l-5.2-5C1.5,0.1,1.2,0,1,0C0.7,0,0.5,0.1,0.3,0.3c-0.4,0.4-0.4,1,0,1.4L4.8,6z"/></svg></button>'
      };

    if ($gallery.hasClass('jupiterx-product-gallery-vertical')) {
      options = $.extend(options, {
        vertical: true,
        slidesToShow: 5,
      })
    }

    $gallery.find('.flex-control-thumbs').slick(options);

    // Update slick on click flex direction nav.
    $gallery.on('click', '.flex-direction-nav a', function () {
      $gallery.find('.flex-control-nav').slick('slickGoTo', $gallery.find('.flex-active-slide').index());
    });
  }

  ProductGallery.prototype.repositionDirectionNav = function () {
    var $gallery = this.$target,
      positionNav;

    if (!$gallery.hasClass('jupiterx-product-gallery-vertical')) {
      return;
    }

    positionNav = function () {
      var $nav = $gallery.find('.flex-direction-nav'),
        $thumbs = $gallery.find('.flex-control-thumbs')

      $nav.css('left', $thumbs.outerWidth(true))
    }

    $(window).resize(positionNav)
    positionNav()
  }

  ProductGallery.prototype.initZoom = function () {
    if (!$.isFunction($.fn.zoom) && !wc_single_product_params.zoom_enabled) {
      return;
    }

    var $target = this.$target,
      zoomTarget = $target.find('.woocommerce-product-gallery__image');

    var galleryWidth = $target.width(),
      zoomEnabled = false;

    $(zoomTarget).each(function (index, target) {
      var image = $(target).find('img');

      if (image.data('large_image_width') > galleryWidth) {
        zoomEnabled = true;
        return false;
      }
    });

    // But only zoom if the img is larger than its container.
    if (zoomEnabled) {
      var zoom_options = {
        touch: false
      };

      if ('ontouchstart' in window) {
        zoom_options.on = 'click';
      }

      zoomTarget.trigger('zoom.destroy');
      zoomTarget.zoom(zoom_options);
    }
  }

  ProductGallery.prototype.preventSmoothScroll = function () {
    this.$target.on('click', '.flex-direction-nav a', function (event) {
      event.preventDefault();
      event.stopPropagation();
    });
  }

  $('.woocommerce-product-gallery').each(function (index, element) {
    new ProductGallery($(element))
  });

});
