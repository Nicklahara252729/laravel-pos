import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * detail element
 * @param {*} widgetData
 */
const detailElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'detail-product-name': 'ingredient_name',
    'detail-kategori': 'category_name',
    'detail-photo': 'photo',
    'detail-satuan': 'unit',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    if (widgetKey === 'photo') {
      $(`#${id}`).attr('src', widgetValue);
    }
    $(`#${id} p`).text(widgetValue);
  });
};

export { detailElement };
