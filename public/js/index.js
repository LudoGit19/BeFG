
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });


// TRI TABLEAU PLAYER

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("sortTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}



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
  