/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * import component
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * row table
 */
const daftarBahanElement = (rowData) => {
  const {
    uuid_ingredient_library,
    ingredient_name,
    stok_tersedia,
    stok_terendah,
    satuan_pengukuran,
    category_name,
    photo,
  } = rowData;
  return `<tr class="hover:bg-slate-100/25 duration-150 cursor-pointer align-middle" data-id="2">
            <td class="detail-button" data-uuid="${uuid_ingredient_library}">
                <div class="d-flex title align-items-center">
                    <img src="${photo}" class="avatar-sm rounded-circle img-thumbnail" alt="">
                    <div class="flex-1 ms-2 ps-1">
                        <a href="javascript:void(0)" class="text-dark mb-0">${ingredient_name}</a>
                    </div>
                </div>
            </td>
            <td>${category_name}</td>
            <td>${formatCurrency(stok_tersedia)}</td>
            <td>${formatCurrency(stok_terendah)}</td>
            <td>${satuan_pengukuran}</td>
            <td class="text-center">
                <button type="button" data-uuid="${uuid_ingredient_library}" class="btn btn-soft-warning ${
    attributeName()[0]['editButton']
  } waves-effect waves-light"><i class="bx bx-edit font-size-16 align-middle"></i></button>
                <button type="button" data-uuid="${uuid_ingredient_library}" data-nama="${ingredient_name}" class="btn btn-soft-danger ${
    attributeName()[0]['deleteButton']
  } waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>
            </td>
        </tr>
    `;
};

export { daftarBahanElement };
