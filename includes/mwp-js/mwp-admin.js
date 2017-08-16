$('body').on('click', '.my_upl_button', function() {
  var currentInput = $(this).prev().attr('name');
    window.send_to_editor = function(html) {
      imgurl = $(html).attr('src')
      $('input[name="'+currentInput+'"]').val(imgurl);
      // $('#picsrc').attr("src",imgurl);
      // $('#'+currentInput).attr("src",imgurl);
      // $(this).find('#picsrc').attr("src",imgurl);
      tb_remove();
    }
    formfield = $('#my_image_URL').attr('name');
    tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
    return false;
});




















