
/*--------------------------------------
	sidebar
--------------------------------------*/
"use strict";
$(document).ready(function () {
  /*-- sidebar js --*/
  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
  });
  /*-- tooltip js --*/
  $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function() {
  $('#magazineModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var recipient = button.data('magazine');
      var modal = $(this);
      modal.find('#bmrMagazine iframe').attr('src',recipient);
  });
  $('#altModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var galId = button.data('galid');
      var blogId = button.data('blogid');
      var modal = $(this);
      modal.find('#gal_id').val(galId);
      modal.find('#blog_id').val(blogId);
  });
});
/*--------------------------------------
    scrollbar js
--------------------------------------*/
var ps = new PerfectScrollbar('#sidebar');
