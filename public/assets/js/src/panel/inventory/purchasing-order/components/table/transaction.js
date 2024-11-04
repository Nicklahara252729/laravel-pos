/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 *  transaction table element
 */
const transactionTableElement = (tableData) => {
  const { rows, date } = tableData;
  const rowsElement = rows.map((row) => tableRowElement(row)).join('');
  return `
  <section class="mb-5">
      <div class="flex justify-between text-primary font-bold mb-2">
          <div class="">${date}</div>
      </div>
      <table class="table rounded-xl overflow-hidden">
          <thead>
              <tr class="bg-blue-100 rounded-lg text-black">
                  <th class="p-3">Item</th>
                  <th class="p-3">Supplier</th>
                  <th class="p-3">Nomor PO</th>
                  <th class="p-3">Nilai Tota</th>
                  <th class="p-3">Status</th>
              </tr>
          </thead>
          <tbody>
            ${rowsElement}
          </tbody>
      </table>
  </section>
  `;
};

/**
 * row table
 */
const tableRowElement = (rowData) => {
  const { uuid_po, item, supplier, nomor_po, total, status } = rowData;
  let colorStatus = ``;
  if (status.kode === 1) {
    colorStatus = `btn btn-secondary btn-sm`;
  } else if (status.kode === 2) {
    colorStatus = `btn btn-warning btn-sm`;
  } else if (status.kode === 3) {
    colorStatus = `btn btn-success btn-sm`;
  } else if (status.kode === 4 || status.kode === 5) {
    colorStatus = `btn btn-danger btn-sm`;
  }
  return `
    <tr class="transaction-row bg-white duration-150 cursor-pointer hover:bg-gray-200 rounded-lg" data-id="${uuid_po}">
        <td class="p-3">${item}</td>
        <td class="p-3">${supplier}</td>
        <td class="p-3">${nomor_po}</td>
        <td class="p-3">Rp ${formatCurrency(total)}</td>
        <td class="p-3"><span class='${colorStatus}'>${status.keterangan}</span></td>
    </tr>
    `;
};

export { transactionTableElement };
