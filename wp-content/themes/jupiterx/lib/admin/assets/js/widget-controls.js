let wrapperSelector = '.jupiterx-flexible-control-wrapper',
    OptionWrappersSelector = '.jupiterx-flexible-option-wrapper',
    OptionSelector = '.jupiterx-flexible-option',
    addSelector = '.jupiterx-flexible-option-add',
    removeSelector = '.jupiterx-flexible-option-remove'

const jupiterxWidget = function() {

  $('.elementor-control .jupiterx-color-picker, .widgets-sortables .jupiterx-color-picker, .widget-rendered .jupiterx-color-picker').wpColorPicker( {
    change: function(e, ui) {
      $( e.target ).val( ui.color.toString() )
      $( e.target ).trigger('change')
    },
    clear: function(e, ui) {
      $(e.target).trigger('change')
    },
  })

  $(wrapperSelector).sortable({
    axis: "y",
    items: '.jupiterx-flexible-item',
    handle: '> label',
    connectWith: '.flexible-item',
    cursor: 'move',
  })

  $(wrapperSelector).on('sortupdate', function(e) {
    $(this).parent().find('input.save-trigger').val(Math.random()).trigger('change').trigger('input')
  })

  $('.elementor-control .jupiterx-select2, .widgets-sortables .jupiterx-select2, .widget-rendered .jupiterx-select2').select2()

  $('.jupiterx-widget-control[data-condr-input]').conditioner()

  $(OptionSelector).on( 'click', function() {
    let $this = $(this),
        parent = $(this).closest(wrapperSelector)

    this.classList.add('hidden')
    this.parentNode.classList.remove( 'flexible-open' )
    parent.find('.jupiterx-flexible-item[data-option="' + $this.data('field') + '"]').first().appendTo(parent).removeClass('hidden')
    $( wrapperSelector ).trigger('change')
  } )

  $(removeSelector).on('click', function(){
    let parent = $(this).parent()
    this.parentNode.classList.add('hidden')
    $(parent).find('input').val('').trigger('change')
  })

  $('.query_type').on( 'focus click change blur', function(e) {
    checkConditions( this );
  } );
}

const checkConditions = function( e ) {
  let element = $(e),
      target = element.parents('.widget-content').find('.thumbnail').parent()
  if ( element.val() === 'comments' ) {
    target.hide()
  } else {
    target.show()
  }
}


jQuery(document).on('widget-updated widget-added', function(){
  jupiterxWidget()
})

jQuery(document).ready( function() {
  jupiterxWidget()
  $('.query_type').each( function() {
    checkConditions(this)
  } )

  $(document).on( 'click', addSelector, function(e) {
    $(e.target).parent().next(OptionWrappersSelector).toggleClass('flexible-open')
  } )
} )

jQuery(document).on( 'ajaxComplete', function() {
  if ( document.body.classList.contains('elementor-editor-active') ){
    jupiterxWidget()
    $('.query_type').each( function() {
      checkConditions(this)
    } )
  }
} )


