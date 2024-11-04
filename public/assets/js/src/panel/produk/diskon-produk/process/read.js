/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { getDiskonProdukAPI } from '../repositories/repositories.js';

/**
 * import helpers
 */
import { TableManager } from '../../../../../helpers/TableManager.js';

/**
 * defined component
 */
const table = `#${attributeName()[0]['table']}`;

/**
 * render discount table
 */
const renderDiscountTable = async () => {
  /**
   * load data discount
   */
  const data = await getDiskonProdukAPI();

  /**
   * table column
   */
  const tableColumn = [
    {
      data: 'discount_name',
    },
    {
      data: 'amount',
    },
    {
      data: null,
      orderable: false,
      render: (data) => {
        const discountTypeText = data.amount_status === 'fixed' ? 'Diskon Tetap' : 'Diskon Kustom';
        return discountTypeText;
      },
    },
  ];

  /**
   * table button
   */
  const tableButton = [
    {
      data: null,
      sClass: 'text-center flex justify-center gap-1',
      orderable: false,
      render: (data) => {
        const deleteButton = `<button type="button" data-uuid="${data.uuid_discount}" data-nama="${
          data.discount_name
        }" class="btn btn-soft-danger ${
          attributeName()[0]['deleteButton']
        } waves-effect waves-light"><i
                class="bx bx-trash-alt font-size-16 align-middle"></i></button>`;
        const editButton = `<button type="button" data-uuid="${
          data.uuid_discount
        }" class="btn btn-soft-warning ${
          attributeName()[0]['editButton']
        } waves-effect waves-light"><i
                class="bx bx-edit font-size-16 align-middle"></i></button>`;
        return [editButton, deleteButton].join('');
      },
    },
  ];

  new TableManager(`${table.selector}`, data, tableColumn, tableButton, {
    rowCallback: true,
    tableClear: true,
    tableAdjust: true,
  });
};

/**
 * initialize
 */
const init = async () => {
  await renderDiscountTable();
};

export { init };
