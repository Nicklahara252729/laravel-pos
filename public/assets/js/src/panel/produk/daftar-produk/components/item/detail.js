/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * detail element
 * @param {*} widgetData
 */
const detailElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'detail-product-name': 'product_name',
    'detail-description': 'description',
    'detail-photo': 'photo',
    'detail-price': 'price',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    let text = '';

    if (widgetKey === 'photo') {
      $(`#${id}`).attr('src', widgetValue);
    }

    if (widgetKey === 'price') {
      text = `Rp. ${formatCurrency(widgetValue)}`;
    } else {
      text = widgetValue;
    }
    $(`#${id} p`).text(text);
  });
};

export { detailElement };
