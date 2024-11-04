/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { getPajakProdukAPI } from '../repositories/repositories.js';

/**
 * import helper
 */
import { TableManager } from '../../../../../helpers/TableManager.js';

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const deleteBtn = attributeName()[0]['deleteButton'];
const editBtn = attributeName()[0]['editButton'];

/**
 * render table
 */
const renderPajakTable = async () => {
  /**
   * load data discount
   */
  const data = await getPajakProdukAPI();

  /**
   * table column
   */
  const tableColumn = [
    {
      data: 'tax_information',
    },
    {
      data: null,
      render: (data) => {
        return `${data.amount} %`;
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
        const btnEdit = `<button type="button"
                class="btn btn-soft-warning ${editBtn} waves-effect waves-light" data-uuid="${data.uuid_tax}"><i
                class="bx bx-edit font-size-16 align-middle"></i></button>`;
        const btnDelete = `<button type="button"
                class="btn btn-soft-danger ${deleteBtn} waves-effect waves-light" data-uuid="${data.uuid_tax}" data-nama="${data.tax_information}"><i
                    class="bx bx-trash-alt font-size-16 align-middle"></i></button>`;
        return [btnEdit, btnDelete].join('');
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
  await renderPajakTable();
};

export { init };
