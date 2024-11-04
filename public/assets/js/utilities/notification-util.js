/**
 * load current notification
 */
const currentNoficationAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/notifikasi/current`,
        type: 'GET',
      },
      {
        isLoading: false,
        outlet: false,
      }
    );
    return response.data;
  } catch (e) {
    if (e.status != 404) {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 *  notification element
 */
const notificationElement = (datas) => {
  const { title, description, time, module, link } = datas;
  const icon = notificationRenderIcon(module);
  return `
  <a href="${link}" class="text-reset notification-item">
                <div class="d-flex">
                    <div class="flex-shrink-0 avatar-sm me-3">
                        <span class="avatar-title bg-primary rounded-circle font-size-18">
                            <i class="bx ${icon}"></i>
                        </span>
                    </div>
                    <div class="flex-grow-1">
                        <p class="text-muted font-size-13 mb-0 float-end">${time}</p>
                        <h6 class="mb-1">${title}</h6>
                        <div>
                            <p class="mb-0">${description}</p>
                        </div>
                    </div>
                </div>
            </a>
  `;
};

/**
 * render notification bar
 */
const renderNotification = (datas) => {
  const notificationEl = datas.map((data) => notificationElement(data)).join('');
  const notifNumber = datas.length;
  $(`#notification-bar section`).append(notificationEl);
  $(`.notif-number`).text(`${notifNumber} notifikasi baru`);
  $(`.noti-icon span`).text(notifNumber);
};

/**
 * initialize
 */
const notificationInit = async () => {
  const data = await currentNoficationAPI();
  renderNotification(data);
};
