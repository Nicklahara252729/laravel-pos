/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';
import { capitalizeFirstLetter } from '../../../../../../helpers/converter.js';

/**
 *  invoice table table element
 */
const invoiceTable = (tableData) => {
  const { uuid_invoice, tanggal, invoice, outlet, customer, status, jumlah } = tableData;

  /**
   * set status color
   */
  let statusColor = '';
  if (status.kode === 1 || status.kode === 2 || status.kode === 5) {
    statusColor = `text-danger`;
  } else if (status.kode === 3) {
    statusColor = `text-success`;
  } else {
    statusColor = `text-warning`;
  }

  return `
    <tr id="detail-button" data-uuid="${uuid_invoice}" data-number="${invoice}" class="cursor-pointer">
      <td>${capitalizeFirstLetter(tanggal)}</td>
      <td>${invoice}</td>
      <td>${capitalizeFirstLetter(outlet)}</td>
      <td>${capitalizeFirstLetter(customer)}</td>
      <td class="${statusColor}">${capitalizeFirstLetter(status.keterangan)}</td>
      <td>Rp. ${formatCurrency(jumlah)}</td>
    </tr>
    `;
};

export { invoiceTable };
