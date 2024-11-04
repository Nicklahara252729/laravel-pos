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
    'detail-bundle-name': 'bundle_name',
    'detail-status-bundle': 'status',
    'detail-bundle-image': 'bundle_package_image',
    'detail-bundle-price': 'bundle_price',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    let text = '';
    let statusElement = '';

    if (widgetKey === 'bundle_package_image') {
      $(`.${id}`).attr('src', widgetValue);
    }

    if (widgetKey === 'status') {
      if (widgetValue === 'active') {
        statusElement = `<div class="flex items-center gap-1 text-success">
                            <i class="bx bx-badge-check text-xl"></i>
                            <div class="">Aktif</div>
                          </div>`;
      } else {
        statusElement = `<div class="flex tems-center gap-1 text-danger">
                            <i class="bx bx-error text-xl"></i>
                            <div class="">Tidak Aktif</div>
                          </div>`;
      }
      $(`#${id}`).empty();
      $(`#${id}`).append(statusElement);
    }

    if (widgetKey === 'bundle_price') {
      text = `Rp. ${formatCurrency(widgetValue)}`;
    } else {
      text = widgetValue;
    }
    $(`.${id}`).text(text);
  });
};

/**
 * detail outlet element
 */
const detailOutletElement = (data) => {
  const { outlet_name } = data;
  return `<li>${outlet_name}</li>`;
};

/**
 * detail item element
 */
const detailItemElemet = (data) => {
  const { product_name } = data;
  return `<tr>
            <td>${product_name}</td>
            <td>Varian Hitam</td>
            <td class="text-right">${formatCurrency(0)}</td>
          </tr>`;
};

/**
 * detail hpp element
 */
const detailHppElement = (data) => {
  const { option_name, price } = data;
  return `<tr>
            <td>${option_name}</td>
            <td class="text-right">${formatCurrency(price)}</td>
          </tr>`;
};

export { detailElement, detailOutletElement, detailItemElemet, detailHppElement };
