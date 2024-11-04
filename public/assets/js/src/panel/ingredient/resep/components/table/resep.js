/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * import component
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const tableBody = $(`#${attributeName()[0]['tableResep']} tbody`);

/**
 * render resep table
 */
const renderResepTable = (reseps) => {
  tableBody.empty();

  if (reseps && reseps.length > 0) {
    reseps.forEach(function (resep) {
      const formattedJumlah = formatCurrency(resep.jumlah);
      const formattedHpp = formatCurrency(resep.hpp);

      const rowHtml = `
          <tr>
            <td>${resep.bahan}</td>
            <td>${resep.satuan}</td>
            <td class="text-right">${formattedJumlah}</td>
            <td class="text-right">Rp ${formattedHpp}</td>
          </tr>
        `;
      tableBody.append(rowHtml);
    });
  }
};

export { renderResepTable };
