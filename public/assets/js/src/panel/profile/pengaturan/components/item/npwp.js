const npwpElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'npwp-name': 'npwp_name',
    npwp: 'npwp',
    'npwp-photo': 'npwp_photo',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    if (id == 'npwp-photo') {
      $(`#${id}`).attr('src',widgetValue);
    } else {
      $(`#${id}`).text(widgetValue);
    }
  });
};

export { npwpElement };
