/**
 * import helper
 */
import { formatCurrency } from '../../../../../helpers/converter.js';

/**
 *  transaction table element
 */
const transactionTableElement = (tableData) => {
  const { rows, date, total } = tableData;
  const rowsElement = rows.map((row) => tableRowElement(row)).join('');
  return `
  <section class="mb-5">
      <div class="flex justify-between text-primary font-bold mb-2">
          <div class="">${date}</div>
          <div class="">Total : ${total}</div>
      </div>
      <table class="table rounded-xl overflow-hidden">
          <thead>
              <tr class="bg-blue-100 rounded-lg text-black">
                  <th class="p-3">Outlet</th>
                  <th class="p-3">Waktu</th>
                  <th class="p-3">Pegawai</th>
                  <th class="p-3">Produk</th>
                  <th class="p-3">Harga</th>
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
  const { transaction_uuid, outlet, time, employee, product, price } = rowData;
  return `
    <tr class="transaction-row bg-white duration-150 cursor-pointer hover:bg-gray-200 rounded-lg" data-id="${transaction_uuid}">
        <td class="p-3">${outlet}</td>
        <td class="p-3">${time}</td>
        <td class="p-3">${employee}</td>
        <td class="p-3 line-clamp-1">${product}</td>
        <td class="p-3">${price}</td>
    </tr>
    `;
};

/**
 * widget total riwayat transaksi
 */
const widgetTotalElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    transaksi: 'transaksi',
    'total-pendapatan': 'total_pendapatan',
    'penjualan-bersih': 'penjualan_bersih',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    let text;
    if (id == 'transaksi') {
      text = `${widgetValue}`;
    } else {
      text = `Rp. ${formatCurrency(widgetValue)}`;
    }
    $(`#${id}`).text(text);
  });
};

export { transactionTableElement, widgetTotalElement };
