const akunElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    name: 'name',
    email: 'email',
    phone: 'phone',
    'status-kontak': 'status_kontak',
    'status-email': 'status_email',
  };

  let statusElement;
  let statusVerificationElement;
  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    if (id == 'status-kontak' || id == 'status-email') {
      const statusVerification =
        id == 'status-email' ? 'status-email-verification' : 'status-kontak-verification';
      if (widgetValue != null) {
        statusElement = `<div class="flex items-center gap-1 text-success">
                                            <i class="bx bx-badge-check text-xl"></i>
                                            <div class="">Terverifikasi</div>
                                        </div>`;
      } else {
        statusElement = `<div class="flex tems-center gap-1 text-warning">
                                      <i class="bx bx-error text-xl"></i>
                                      <div class="">Belum Verifikasi</div>
                                  </div>`;

        const verificationButton =
          id == 'status-email' ? 'email-verifikasi-button' : 'kontak-verifikasi-button';
        statusVerificationElement = `<div class="font-bold text-primary" id="${verificationButton}">
                                            <a href="#">Verifikasi sekarang</a>
                                        </div>`;
      }
      $(`#${id}`).append(statusElement);
      statusVerificationElement = widgetValue != null ? '' : statusVerificationElement;
      $(`#${statusVerification}`).append(statusVerificationElement);
    } else {
      $(`#${id}`).text(`${widgetValue}`);
    }
  });
};

export { akunElement };
