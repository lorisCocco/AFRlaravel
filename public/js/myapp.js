$('#burger').click(function(){
  $('#nav').toggleClass('hidden');
})

$('#nav a').click(function(){
  $('#nav').toggleClass('hidden');
})

$(document).ready(function(){
  let btn = $('#toTop');
  $(window).scroll(function(){
    if($(window).scrollTop() > 800){
      btn.css('display','block');
    }
  });
  btn.click(function(e){
    e.preventDefault();
    $(document).scrollTop(0);
  })
})

jQuery("input[type='text'], textarea").on("input", function () {
  var isValid = validate();
  if (isValid) {
    jQuery("#submit").removeAttr("disabled").removeClass('bg-gray-400').addClass('bg-green-400 text-white');
  } else {
      jQuery("#submit").attr("disabled", "disabled");
  }
});

function validate() {
var isValid = true;
$('input, textarea').each(function() {
  if ($(this).val() === '')
      isValid = false;
});
return isValid;
}

$('img[data-enlargeable]').addClass('img-enlargeable').click(function(){
  var src = $(this).attr('src');
  var modal;
  function removeModal(){ modal.remove(); $('body').off('keyup.modal-close'); }
  modal = $('<div>').css({
      background: 'RGBA(0,0,0,.5) url('+src+') no-repeat center',
      backgroundSize: 'contain',
      width:'100%', height:'100%',
      position:'fixed',
      zIndex:'10000',
      top:'0', left:'0',
      cursor: 'zoom-out'
  }).click(function(){
      removeModal();
  }).appendTo('body');
  //handling ESC
  $('body').on('keyup.modal-close', function(e){
    if(e.key==='Escape'){ removeModal(); } 
  });
});