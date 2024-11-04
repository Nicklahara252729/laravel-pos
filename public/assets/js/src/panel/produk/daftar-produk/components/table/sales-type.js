/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const tableBody = $(`#${attributeName()[0]['tableSalesType']} tbody`);

/**
 * sales type list
 */
const renderSalesTypeList = (datas) => {
  let rowHtml = '';
  Object.values(datas).forEach(function (value) {
    rowHtml += `<li>${value}</li>`;
  });
  return rowHtml;
};

/**
 * price variant list
 */
const renderPriceVariantList = (datas) => {
  let rowHtml = '';
  Object.values(datas).forEach(function (value) {
    rowHtml += `<li>Rp ${formatCurrency(value)}</li>`;
  });
  return rowHtml;
};

/**
 * render sales type table
 */
const renderSalesTypeTable = (datas) => {
  tableBody.empty();
  if (datas && datas.length > 0) {
    datas.forEach(function (data, index) {
      const salesTypeList = renderSalesTypeList(data.salesType);
      const priceVariantList = renderPriceVariantList(data.price);

      const rowHtml = `
          <tr>
            <td>${data.name}</td>
            <td>
              <ul class="p-0">
                ${salesTypeList}
              </ul>
            </td>
            <td class="text-right">
              <ul class="p-0">
                ${priceVariantList}
              </ul>
            </td>
          </tr>
        `;
      tableBody.append(rowHtml);
    });
  }
};

export { renderSalesTypeTable };
