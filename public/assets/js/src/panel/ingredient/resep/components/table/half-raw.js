/**
 * import helper
 */
import { capitalizeFirstLetter } from '../../../../../../helpers/converter.js';

/**
 * import coomponet attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * row table
 */
const halfRawTableElement = (listData) => {
  let tableRows = '';
  const { uuid_recipe, item, kategori, hasil_resep, bahan, stock_alert } = listData;
  const alert = stock_alert === null ? `` : stock_alert;
  tableRows += `<tr class="hover:bg-slate-100/25 duration-150 cursor-pointer align-middle">
                  <td id="detail-button" data-uuid="${uuid_recipe}">${capitalizeFirstLetter(item)}</td>
                  <td>${kategori}</td>
                  <td>${hasil_resep}</td>
                  <td>${bahan}</td>
                  <td><span class="text-danger">${alert}</span></td>
                  <td class="text-center">
                      <button type="button" id="${attributeName()[0]['editButton']}" data-uuid="${uuid_recipe}" class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit font-size-16 align-middle"></i></button>
                  </td>
              </tr>`;
  return tableRows;
};

export { halfRawTableElement };
