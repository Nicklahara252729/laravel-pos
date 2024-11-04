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
const tableBody = $(`#${attributeName()[0]['tableRiwayatPembayaran']} tbody`);

/**
 *  riwayat pembayaran table element
 */
const riwayatPembayaranTable = (tableData) => {
  if (tableData && tableData.length > 0) {
    tableData.forEach(function (data) {
      const paid = formatCurrency(data.paid);
      const left = formatCurrency(data.left);

      const rowHtml = `
          <tr>
            <td>Rp ${paid}</td>
            <td>${data.date}</td>
            <td>Rp ${left}</td>
          </tr>
        `;
      tableBody.append(rowHtml);
    });
  }
};

export { riwayatPembayaranTable };
