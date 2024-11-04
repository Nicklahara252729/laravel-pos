
$("#form-data-registration input").on("change invalid", function () {
    var input = $(this).get(0);
    input.setCustomValidity("");
    if (!input.validity.valid) {
        input.setCustomValidity("Opss.. harus diisi !");
    }
});

function checkPass() {
    var password = $('#password').val();
    var confirmPassword = $('#password_confirmation').val();
    if (password == confirmPassword && password != "" && confirmPassword != "" && password.length >= 8) {
        $('#btnSimpan').attr('type', 'submit');
        $('#btnSimpan').attr('class', 'btn btn-primary');
        $('#msg-pass').attr('style', 'display:block;');
        $('#msg-pass').attr('class', 'alert alert-success');
        $('#msg-pass span').html("Password match!");
    } else {
        $('#msg-pass').attr('style', 'display:block;');
        $('#msg-pass').attr('class', 'alert alert-danger');
        if (password != confirmPassword) {
            $('#msg-pass span').html("Password doesn't match!");
        } else if (password.length < 8) {
            $('#msg-pass span').html('Minimum character length 8');
        }
        $('#btnSimpan').attr('type', 'button');
        $('#btnSimpan').attr('class', 'btn disbled');
    }
}