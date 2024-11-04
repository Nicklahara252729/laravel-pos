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
 * render outlet
 */
const renderOutlet = (outlets) => {
  const { outlet_name } = outlets;
  return `${outlet_name}`;
};

/**
 * row table
 */
const paketBundleTableElement = (rowData) => {
  const { uuid_promo, promo, date, status, outlet, time } = rowData;
  const outletElement = outlet.map((outlets) => renderOutlet(outlets)).join('');
  const statusElement =
    status === 'active'
      ? `<span class="text-success">Aktif</span>`
      : `<span class="text-danger">Tidak Aktif</span>`;
  return `<tr class="hover:bg-slate-100/25 duration-150 cursor-pointer align-middle">
            <td class="detail-button" data-uuid="${uuid_promo}">${promo}</td>
            <td>${date}</td>
            <td>${time}</td>
            <td>${outletElement}</td>
            <td>${statusElement}</td>
            <td class="text-center">
                <button type="button" data-uuid="${uuid_promo}" class="btn btn-soft-warning ${editButton} waves-effect waves-light"><i class="bx bx-edit font-size-16 align-middle"></i></button>
                <button type="button" data-uuid="${uuid_promo}" data-nama="${promo}" class="btn btn-soft-danger ${deleteButton} waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>
            </td>
        </tr>
    `;
};

export { paketBundleTableElement };
