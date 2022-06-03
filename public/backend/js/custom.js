
CKEDITOR.replace('textarea1');
CKEDITOR.config.entities = false;


CKEDITOR.replace('textarea2');
CKEDITOR.config.entities = false;


CKEDITOR.replace('textarea3');
CKEDITOR.config.entities = false;


$('select:not(.normal)').each(function() {
    $(this).select2({
      dropdownParent: $(this).parent()
    });
  });
  $('select').select2({
    dropdownCssClass: 'custom-dropdown'
  });
  $('select').on('select2:open', function(e) {
    $('.custom-dropdown').parent().css('z-index', 99999);
  });