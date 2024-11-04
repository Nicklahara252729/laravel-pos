/**
 * load current notification
 */
window.addEventListener('load', async () => {
  notificationInit();
});

/**
 * riwayat perubahan modal`
 */
$(document).on('click', '#changelog', function () {
  $('#modalChangeLog').modal('show');
});

/*
 * Move to hasil pencarian page on search
 */
$('#form-pencarian').submit(function (e) {
  e.preventDefault();
  var search_val = $('#pencarian').val();
  window.location.href = '/pencarian?key=' + search_val;
});
