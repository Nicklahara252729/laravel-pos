/**
 * import component attribute
 */
import { attributeName } from "../attribute/attribute-name.js";

/**
 * row table
 */
const metodePembayaranTableElement = (rowData) => {
  const { uuid_metode_pembayaran, outlet, nama_konfigurasi } = rowData;
  return `<tr>
            <td data-uuid="${uuid_metode_pembayaran}" class="cursor-pointer detail-button">${nama_konfigurasi}</td>
            <td>${outlet}</td>
            <td class="text-center">
                <button type="button" data-uuid="${uuid_metode_pembayaran}" class="btn btn-soft-warning ${attributeName()[0]['editButton']} waves-effect waves-light"><i class="bx bx-edit font-size-16 align-middle"></i></button>
                <button type="button" data-uuid="${uuid_metode_pembayaran}" data-nama="${nama_konfigurasi}" class="btn btn-soft-danger ${attributeName()[0]['deleteButton']} waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>
            </td>
        </tr>
    `;
};

export { metodePembayaranTableElement };
