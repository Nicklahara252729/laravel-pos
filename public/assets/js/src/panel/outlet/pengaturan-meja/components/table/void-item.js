/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * void table element
 */
const voidTableElement = (rowData) => {
  const { time, struck, item, qty, reason, price } = rowData;
  return `
    <tr class="hover:bg-slate-100/25 duration-150 cursor-pointer align-middle">
            <td>${time}</td>
            <td>${struck}</td>
            <td>${item}</td>
            <td>${formatCurrency(qty)}</td>
            <td>${reason}</td>
            <td>Rp ${formatCurrency(price)}</td>
        </tr>
    `;
};

export { voidTableElement };
