$('#logout-button').on('click', (event) => {
  swalConfirmLogout(() => {
    $('#formLogout').submit();
    removeCookies();
  });
});
