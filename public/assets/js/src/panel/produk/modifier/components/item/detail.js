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
    'detail-nama-modifier': 'modifier_name',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    $(`#${id}`).text(widgetValue);
  });
};

/**
 * detail option element
 */
const detailOptionElement = (data) => {
  const { option_name, price } = data;
  return `<tr>
            <td>${option_name}</td>
            <td class="text-right">${formatCurrency(price)}</td>
          </tr>`;
};

/**
 * detail recipe element
 */
const detailRecipeElement = () => {};

export { detailElement, detailOptionElement, detailRecipeElement };
