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
 * render item
 */
const renderItem = (items) => {
  const { product_name } = items;
  return `${product_name}`;
};

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
  const {
    uuid_bundle_package,
    bundle_package_image,
    bundle_name,
    bundle_price,
    status,
    outlet,
    item,
  } = rowData;
  const itemElement = item.map((items) => renderItem(items)).join('');
  const outletElement = outlet.map((outlets) => renderOutlet(outlets)).join('');
  const statusElement =
    status === 'active'
      ? `<span class="text-success">Aktif</span>`
      : `<span class="text-danger">Tidak Aktif</span>`;
  return `<tr class="hover:bg-slate-100/25 duration-150 cursor-pointer align-middle">
            <td class="detail-button" data-uuid="${uuid_bundle_package}">
                <div class="d-flex title align-items-center">
                    <img src="${bundle_package_image}" class="avatar-sm rounded-circle img-thumbnail" alt="">
                    <div class="flex-1 ms-2 ps-1">
                        <span class="text-dark mb-0">${bundle_name}</span>
                    </div>
                </div>
            </td>
            <td>${itemElement}</td>
            <td>Rp. ${formatCurrency(bundle_price)}</td>
            <td>${outletElement}</td>
            <td>${statusElement}</td>
            <td class="text-center">
                <button type="button" data-uuid="${uuid_bundle_package}" class="btn btn-soft-warning ${editButton} waves-effect waves-light"><i class="bx bx-edit font-size-16 align-middle"></i></button>
                <button type="button" data-uuid="${uuid_bundle_package}" data-nama="${bundle_name}" class="btn btn-soft-danger ${deleteButton} waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>
            </td>
        </tr>
    `;
};

export { paketBundleTableElement };
