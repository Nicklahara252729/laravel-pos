/**
 * import helper
 */
import { formatCurrency } from "../../../../../helpers/converter.js";

/**
 * table pelanggan element 
 */
const pelangganTableElement = (rowData) => {
  const { uuid_customer, name, tgl_bergabung, total } = rowData;
  return `
      <tr class="hover:bg-slate-100/25 duration-150 cursor-pointer align-middle" data-uuid="${uuid_customer}">
        <td>${name}</td>
        <td>${tgl_bergabung}</td>
        <td class="text-right">Rp. ${formatCurrency(total)}</td>
      </tr>`;
};

export { pelangganTableElement };
