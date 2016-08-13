$('.Form-register input, .Form-register textarea, .Form-register  select').on('change',function(){
   $(this).siblings('p').remove();
   $(this).removeClass('error')
});
$('.ErrorsAlert-content span').on('click',function(){
   $('.ErrorsAlert').hide();
});


$('#activities').keyup(function(){
   var len = $(this).val().length,
       count =  400 - len;

   $('#caracter').html('('+ count  +' caracteres)')
   console.log('sds');

})


