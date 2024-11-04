/**
 * alert success
 */
const swalSuccess = (message, handleSuccess = null) => {
  swal({
    title: titleSuccess,
    icon: iconSuccess,
    text: message,
  }).then((isConfirmed) => {
    if (isConfirmed) {
      if (handleSuccess != null) {
        handleSuccess();
      }
    }
  });
};

/**
 * alert error
 */
const swalError = (message) => {
  const element = document.createElement('div');
  element.innerHTML = message;
  swal({
    title: titleError,
    icon: iconError,
    content: element,
  });
};

/**
 * alert not found
 */
const swalNotFound = (param) => {
  swal({
    title: titleNotFound,
    icon: iconWarning,
    text: textNotFound(param),
  });
};

/**
 * alert cancel
 */
const swalCancel = (message) => {
  swal({
    title: titleCancel,
    icon: iconInfo,
    text: message,
  });
};

/**
 * confirm logout
 */
const swalConfirmLogout = (onConfirm) => {
  swal({
    title: titleConfirmLogout,
    text: textConfirmLogout,
    icon: iconWarning,
    dangerMode: false,
    buttons: {
      cancel: 'Batal',
      confirm: 'Ya! Logut',
    },
  }).then((isConfirmed) => {
    if (isConfirmed) {
      onConfirm();
    }
  });
};

/**
 * alert confirmation delete / restore / etc
 */
const swalConfirmation = (param, onConfirm) => {
  const key = 'type';
  const action = [
    {
      type: 'delete',
      title: titleConfirmDelete,
    },
    {
      type: 'nonactive',
      title: titleConfirmNonaktif,
    },
    {
      type: 'activate',
      title: titleConfirmActivation,
    },
    {
      type: 'verification',
      title: titleConfirmVerification,
    },
    {
      type: 'import change',
      title: titleImportChange,
    },
    {
      type: 'duplicate',
      title: titleConfirmDuplicate,
    },
  ];
  const message = param.message;
  const title = action.filter((item) => item[key] === param.title);
  swal({
    title: title[0].title,
    text: message,
    icon: iconWarning,
    showCancelButton: true,
    dangerMode: false,
    buttons: {
      cancel: 'Batal',
      confirm: 'Ya! Lanjut',
    },
  }).then((isConfirmed) => {
    if (isConfirmed) {
      onConfirm();
    }
  });
};
