$(document).ready(function() {
  $('li.nav-item').hover(function(){
  $('.submenu-shop-cart').hide();
  });
  $('li.nav-item.cart-values').hover(function(){
  $('.submenu-shop-cart').show();
  });
  $('li.nav-item.cart-values').mouseenter(function(){
  $('.submenu-shop-cart').removeClass('moseout');
  });
  $('.submenu-shop-cart').mouseleave(function(){
   $(this).addClass('moseout');
  });
  $('div#mobile-top-bar .shop-icons').click(function(){
      $('.submenu-shop-cart').toggle();
     });
 });
 $(document).ready(function() {
  $('.minus').click(function () {
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
    $input.change();
    return false;
  });
  $('.plus').click(function () {
    var $input = $(this).parent().find('input');
    $input.val(parseInt($input.val()) + 1);
    $input.change();
    return false;
  });
 });
 $(document).ready(function() {
  $('.close').click(function(){
  $(this).parents('.shopping-cart-box').hide();
  });
  });

  $(document).ready(function() {
    $('.checkbox-project-relative>input').change(function(){
      if($(this).is(":checked")) {
          $(this).parents('.my-project-checkbox').next().slideDown();
      } else {
        $(this).parents('.my-project-checkbox').next().slideUp();
      }
  });
  });
  $(document).ready(function() {
    $('.checkbox-click-wrapper input').change(function(){
      if($(this).is(":checked")) {
          $(this).parents('.checkbox-click-wrapper').next().slideDown();
      } else {
        $(this).parents('.checkbox-click-wrapper').next().slideUp();
      }
  });
  });
  $(document).ready(function() {
  $('.card-link').click(function(){
  $(this).parents('.card').toggleClass('nomargin');
  $(this).parents('.card').nextAll().removeClass('nomargin');
  $(this).parents('.card').prevAll().removeClass('nomargin');
  });
  });
$(document).ready(function(){
$('.image-icn').click(function(){
 $('.image-quote-box-flex').addClass('grid-view-flex');
 $('.image-quote-box-flex').removeClass('list-view-flex');
});
$('.list-icn').click(function(){
  $('.image-quote-box-flex').addClass('list-view-flex');
  $('.image-quote-box-flex').removeClass('grid-view-flex');
 });
});

  