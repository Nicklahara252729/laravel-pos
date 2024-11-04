const showAlert = (message, alertClass) => {
    $("#alert-container").empty().append(`
        <div class="alert ${alertClass}" id="alert-warning">
          ${message}
        </div>
      `);
};

export { showAlert }