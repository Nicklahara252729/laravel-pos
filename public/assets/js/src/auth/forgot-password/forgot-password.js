$("#form-data-forgot-password input").on("change invalid", function () {
  var input = $(this).get(0);
  input.setCustomValidity("");
  if (!input.validity.valid) {
      input.setCustomValidity("Opss.. harus diisi !");
  }
});