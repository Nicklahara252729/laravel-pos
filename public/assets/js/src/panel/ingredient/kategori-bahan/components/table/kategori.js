/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * row table
 */
const kategoriTableElement = (rowData) => {
  const { uuid_ingredient_category, category_name, jumlah_barang } = rowData;
  return `<tr class="hover:bg-slate-100/25 duration-150 cursor-pointer align-middle">
  <td data-uuid="${uuid_ingredient_category}" class="cursor-pointer detail-button">${category_name}</td>
  <td>${jumlah_barang}</td>
  <td class="text-center cursor-pointer text-primary assign-item-button" data-uuid="${uuid_ingredient_category}">Assign Item</td>
            <td class="text-center">
                <button type="button" data-uuid="${uuid_ingredient_category}" class="btn btn-soft-warning ${
    attributeName()[0]['editButton']
  } waves-effect waves-light"><i class="bx bx-edit font-size-16 align-middle"></i></button>
                <button type="button" data-uuid="${uuid_ingredient_category}" data-nama="${category_name}" class="btn btn-soft-danger ${
    attributeName()[0]['deleteButton']
  } waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>
            </td>
        </tr>
    `;
};

export { kategoriTableElement };
