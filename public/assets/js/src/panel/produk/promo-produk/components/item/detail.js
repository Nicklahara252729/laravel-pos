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
    'detail-promo-name': 'promo_name',
    'detail-jenis-promo': 'promo_type',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    let text = widgetValue;
    let statusElement = '';

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

    if (widgetKey === 'promo_type') {
      if (widgetValue === 'discount') {
        text = 'Diskon Per Item';
      } else {
        text = 'Gratis Produk';
      }
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
