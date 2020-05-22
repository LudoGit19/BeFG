
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });

// $(function(){
//   $('[data-toggle="tooltip"]').tooltip();
//   $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
//       $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
//   });
//   $('.side-nav .collapse').on("show.bs.collapse", function() {                        
//       $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
//   });
// })    



// // menu
// $("#menu-toggle").click(function(e) {
//     e.preventDefault();
//     $("#wrapper").toggleClass("toggled");
//   });
  


// début test Dual List ####################################################################################################################################################################
// $(function () {

//   $('body').on('click', '.list-group .list-group-item', function () {
//       $(this).toggleClass('active');
//   });
//   $('.list-arrows button').click(function () {
//       var $button = $(this), actives = '';
//       if ($button.hasClass('move-left')) {
//           actives = $('.list-right ul li.active');
//           actives.clone().appendTo('.list-left ul');
//           actives.remove();
//       } else if ($button.hasClass('move-right')) {
//           actives = $('.list-left ul li.active');
//           actives.clone().appendTo('.list-right ul');
//           actives.remove();
//       }
//   });
//   $('.dual-list .selector').click(function () {
//       var $checkBox = $(this);
//       if (!$checkBox.hasClass('selected')) {
//           $checkBox.addClass('selected').closest('.well').find('ul li:not(.active)').addClass('active');
//           $checkBox.children('i').removeClass('glyphicon-unchecked').addClass('glyphicon-check');
//       } else {
//           $checkBox.removeClass('selected').closest('.well').find('ul li.active').removeClass('active');
//           $checkBox.children('i').removeClass('glyphicon-check').addClass('glyphicon-unchecked');
//       }
//   });
//   $('[name="SearchDualList"]').keyup(function (e) {
//       var code = e.keyCode || e.which;
//       if (code == '9') return;
//       if (code == '27') $(this).val(null);
//       var $rows = $(this).closest('.dual-list').find('.list-group li');
//       var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
//       $rows.show().filter(function () {
//           var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
//           return !~text.indexOf(val);
//       }).hide();
//   });

// });

// fin test dual list  ####################################################################################################################################################################
// jQuery(function($){
//   $('.navbar-toggle').click(function(){
//   $('.navbar-collapse').toggleClass('right');
//   $('.navbar-toggle').toggleClass('indexcity');
//   });
// });
  