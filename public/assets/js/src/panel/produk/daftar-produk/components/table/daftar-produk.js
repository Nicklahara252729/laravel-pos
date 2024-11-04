/**
 * import helpers
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const editButton = attributeName()[0]['editButton'];
const deleteButton = attributeName()[0]['deleteButton'];

/**
 * row table
 */
const daftarProdukTableEl = (rowData) => {
  const { uuid_item, product_name, category_name, price, photo, sku, variants } = rowData;
  const variant = variants.length;
  return `<tr class="hover:bg-slate-100/25 duration-150 cursor-pointer align-middle">
            <td class="detail-button" data-uuid="${uuid_item}">
                <div class="d-flex title align-items-center">
                  <img src="${photo}" class="avatar-sm rounded-circle img-thumbnail" alt="">
                  <div class="flex-1 ms-2 ps-1">
                      <span class="text-dark mb-0">${product_name}</span>
                  </div>
              </div>
            </td>
            <td>${category_name}</td>
            <td>Rp ${formatCurrency(price)}</td>
            <td>${sku}</td>
            <td>${variant}</td>
            <td class="text-center">
                <button type="button" data-uuid="${uuid_item}" class="btn btn-soft-warning ${editButton} waves-effect waves-light"><i class="bx bx-edit font-size-16 align-middle"></i></button>
                <button type="button" data-uuid="${uuid_item}" data-nama="${product_name}" class="btn btn-soft-danger ${deleteButton} waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>
            </td>
        </tr>
    `;
};

export { daftarProdukTableEl };
