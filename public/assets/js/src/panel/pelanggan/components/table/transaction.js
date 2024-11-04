/**
 * import helper
 */
import { formatCurrency } from '../../../../../helpers/converter.js';

/**
 * transaction item
 */
const transactionItem = ({ uuid_transaksi, tanggal, outlet, nominal }) => {
  return `
    <li class="flex justify-between p-3 hover:bg-gray-800 hover:text-white duration-300 cursor-pointer rounded-lg" data-uuid="${uuid_transaksi}">
        <div class="basis-1/3 text-left">${tanggal}</div>
        <div class="basis-1/3 text-left">${outlet}</div>
        <div class="basis-1/3 text-right">Rp. ${formatCurrency(nominal)}</div>
    </li>`;
};

export { transactionItem };
