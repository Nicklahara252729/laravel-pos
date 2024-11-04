/**
 * import helper
 */
import { formatCurrency } from "../../../../../../helpers/converter.js";

/**
 * row table
 */
const stockElement = (rowData) => {
  const {
    variant,
    current_stock,
    minimal_stock, 
  } = rowData;
  return `<tr>
            <td>${variant}</td>
            <td class="text-right">${formatCurrency(current_stock)}</td>
            <td class="text-right">${formatCurrency(minimal_stock)}</td>
        </tr>
    `;
};

export { stockElement };
