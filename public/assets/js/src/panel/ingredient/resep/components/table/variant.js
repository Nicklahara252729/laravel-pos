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
const tableBody = $(`#${attributeName()[0]['tableVariant']} tbody`);

/**
 * render variant table
 */
const renderVariantTable = (variants) => {
  tableBody.empty();

  if (variants && variants.length > 0) {
    variants.forEach(function (variant) {
      const formattedPrice = formatCurrency(variant.price);

      const rowHtml = `
          <tr>
            <td>${variant.name}</td>
            <td class="text-right">Rp ${formattedPrice}</td>
          </tr>
        `;
      tableBody.append(rowHtml);
    });
  }
};

export { renderVariantTable };
