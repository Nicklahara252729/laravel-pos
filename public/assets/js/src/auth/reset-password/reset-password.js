document.getElementById("password-addon").addEventListener("click", function () {
    var e = document.getElementById("password"); "password" === e.type ? e.type = "text" : e.type = "password"
});

document.getElementById("confirm-password-addon").addEventListener("click", function () {
    var e = document.getElementById("password_confirmation"); "password" === e.type ? e.type = "text" : e.type = "password"
});

const checkPass = () => {
    const password = $('#password').val();
    const confirmPassword = $('#password_confirmation').val();
    if (password == confirmPassword && password != "" && confirmPassword != "" && password.length >= 8) {
        $('#btnSimpan').attr('type', 'submit');
        $('#btnSimpan').attr('class', 'btn btn-primary w-100 waves-effect waves-light');
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
        $('#btnSimpan').attr('class', 'btn disbled w-100 waves-effect waves-light');
    }
}

$('#password, #password_confirmation').on('keyup', checkPass);
