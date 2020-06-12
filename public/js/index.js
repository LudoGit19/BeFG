
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });

// FOOTER

$(window).scroll(function() {
  if ($(this).scrollTop() < 50) {
      $("#footer").hide();
  }
  else {
      $("#footer").show();
  }
});

$(document).ready(function($) { 
  $("#sortTable").stupidtable();
 }); 
!function(i){i.fn.stupidtable=function(n){return this.each(function(){var t=i(this);n=n||{},n=i.extend({},i.fn.stupidtable.default_sort_fns,n),t.data("sortFns",n),t.stupidtable_build(),t.on("click.stupidtable","thead th",function(){i(this).stupidsort()}),t.find("th[data-sort-onload=yes]").eq(0).stupidsort()})},i.fn.stupidtable.default_settings={should_redraw:function(t){return!0},will_manually_build_table:!1},i.fn.stupidtable.dir={ASC:"asc",DESC:"desc"},i.fn.stupidtable.default_sort_fns={int:function(t,n){return parseInt(t,10)-parseInt(n,10)},float:function(t,n){return parseFloat(t)-parseFloat(n)},string:function(t,n){return t.toString().localeCompare(n.toString())},"string-ins":function(t,n){return t=t.toString().toLocaleLowerCase(),n=n.toString().toLocaleLowerCase(),t.localeCompare(n)}},i.fn.stupidtable_settings=function(a){return this.each(function(){var t=i(this),n=i.extend({},i.fn.stupidtable.default_settings,a);t.stupidtable.settings=n})},i.fn.stupidsort=function(t){var a=i(this),n=a.data("sort")||null;if(null!==n){var r=a.closest("table"),e={$th:a,$table:r,datatype:n};return r.stupidtable.settings||(r.stupidtable.settings=i.extend({},i.fn.stupidtable.default_settings)),e.compare_fn=r.data("sortFns")[n],e.th_index=l(e),e.sort_dir=u(t,e),a.data("sort-dir",e.sort_dir),r.trigger("beforetablesort",{column:e.th_index,direction:e.sort_dir,$th:a}),r.css("display"),setTimeout(function(){r.stupidtable.settings.will_manually_build_table||r.stupidtable_build();var t=s(e),n=d(t,e);r.stupidtable.settings.should_redraw(e)&&(r.children("tbody").append(n),o(e),r.trigger("aftertablesort",{column:e.th_index,direction:e.sort_dir,$th:a}),r.css("display"))},10),a}},i.fn.updateSortVal=function(t){var n=i(this);return n.is("[data-sort-value]")&&n.attr("data-sort-value",t),n.data("sort-value",t),n},i.fn.stupidtable_build=function(){return this.each(function(){var t=i(this),a=[];t.children("tbody").children("tr").each(function(t,n){var e={$tr:i(n),columns:[],index:t};i(n).children("td").each(function(t,n){var a=i(n).data("sort-value");if(void 0===a){var r=i(n).text();i(n).data("sort-value",r),a=r}e.columns.push(a)}),a.push(e)}),t.data("stupidsort_internaltable",a)})};var s=function(s){var t,n=s.$table.data("stupidsort_internaltable"),d=s.th_index,a=s.$th.data("sort-multicolumn");t=a?a.split(","):[];var o=i.map(t,function(t,n){return r(s.$table,t)});return n.sort(function(t,n){for(var a=o.slice(0),r=s.compare_fn(t.columns[d],n.columns[d]);0===r&&a.length;){var e=a[0],i=e.$e.data("sort");r=(0,s.$table.data("sortFns")[i])(t.columns[e.index],n.columns[e.index]),a.shift()}return 0===r?t.index-n.index:r}),s.sort_dir!=i.fn.stupidtable.dir.ASC&&n.reverse(),n},r=function(t,n){var a,r=t.find("th"),e=parseInt(n,10);return e||0===e?a=r.eq(e):(a=r.siblings("#"+n),e=r.index(a)),{index:e,$e:a}},d=function(t,a){var n=i.map(t,function(t,n){return[[t.columns[a.th_index],t.$tr,n]]});return a.column=n,i.map(t,function(t){return t.$tr})},o=function(t){var n=t.$table,a=t.$th,r=a.data("sort-dir");n.find("th").data("sort-dir",null).removeClass("sorting-desc sorting-asc"),a.data("sort-dir",r).addClass("sorting-"+r)},u=function(t,n){var a,r=n.$th,e=i.fn.stupidtable.dir;return t?a=t:(a=t||r.data("sort-default")||e.ASC,r.data("sort-dir")&&(a=r.data("sort-dir")===e.ASC?e.DESC:e.ASC)),a},l=function(t){var n=0,a=t.$th.index();return t.$th.parents("tr").find("th").slice(0,a).each(function(){var t=i(this).attr("colspan")||1;n+=parseInt(t,10)}),n}}(window.jQuery);




// TRI TABLEAU PLAYER

// function sortTable(n) {
//   var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
//   table = document.getElementById("sortTable");
//   switching = true;
//   //Set the sorting direction to ascending:
//   dir = "asc"; 
//   /*Make a loop that will continue until
//   no switching has been done:*/
//   while (switching) {
//     //start by saying: no switching is done:
//     switching = false;
//     rows = table.rows;
//     /*Loop through all table rows (except the
//     first, which contains table headers):*/
//     for (i = 1; i < (rows.length - 1); i++) {
//       //start by saying there should be no switching:
//       shouldSwitch = false;
//       /*Get the two elements you want to compare,
//       one from current row and one from the next:*/
//       x = rows[i].getElementsByTagName("TD")[n];
//       y = rows[i + 1].getElementsByTagName("TD")[n];
//       /*check if the two rows should switch place,
//       based on the direction, asc or desc:*/
//       if (dir == "asc") {
//         if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
//           //if so, mark as a switch and break the loop:
//           shouldSwitch= true;
//           break;
//         }
//       } else if (dir == "desc") {
//         if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
//           //if so, mark as a switch and break the loop:
//           shouldSwitch = true;
//           break;
//         }
//       }
//     }
//     if (shouldSwitch) {
//       /*If a switch has been marked, make the switch
//       and mark that a switch has been done:*/
//       rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
//       switching = true;
//       //Each time a switch is done, increase this count by 1:
//       switchcount ++;      
//     } else {
//       /*If no switching has been done AND the direction is "asc",
//       set the direction to "desc" and run the while loop again.*/
//       if (switchcount == 0 && dir == "asc") {
//         dir = "desc";
//         switching = true;
//       }
//     }
//   }
// }



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
  