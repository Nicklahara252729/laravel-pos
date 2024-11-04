/**
 * import helper
 */
import { formatCurrency } from "../../../../../../helpers/converter.js";

/**
 * row table
 */
const bahanElement = (rowData) => {
  const {
    bahan,
    satuan,
    jumlah,
    hpp, 
  } = rowData;
  return `<tr>
            <td>${bahan}</td>
            <td>${satuan}</td>
            <td class="text-right">${formatCurrency(jumlah)}</td>
            <td class="text-right">Rp ${formatCurrency(hpp)}</td>
        </tr>
    `;
};

export { bahanElement };
