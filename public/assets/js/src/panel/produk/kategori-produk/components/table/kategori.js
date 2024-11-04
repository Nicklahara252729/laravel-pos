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
const kategoriTableElement = (rowData) => {
  const { uuid_category, jumlah_barang, category_name } = rowData;
  return `<tr class="hover:bg-slate-100/25 duration-150 align-middle">
            <td data-uuid="${uuid_category}" class="cursor-pointer detail-button">${category_name}</td>
            <td>${jumlah_barang}</td>
            <td class="text-center cursor-pointer text-primary assign-item-button" data-uuid="${uuid_category}">Assign Item</td>
            <td class="text-center">
                <button type="button" data-uuid="${uuid_category}" class="btn btn-soft-warning ${editButton} waves-effect waves-light"><i class="bx bx-edit font-size-16 align-middle"></i></button>
                <button type="button" data-uuid="${uuid_category}" data-nama="${category_name}" class="btn btn-soft-danger ${deleteButton} waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>
            </td>
        </tr>
    `;
};

export { kategoriTableElement };
