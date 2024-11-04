/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { getGratuityAPI } from '../repositories/repositories.js';

/**
 * import helper
 */
import { TableManager } from '../../../../../helpers/TableManager.js';

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const editButton = attributeName()[0]['editButton'];
const deleteButton = attributeName()[0]['deleteButton'];

/**
 * render gratuity table
 */
const renderGratuityTable = async () => {
  /**
   * load data discount
   */
  const data = await getGratuityAPI();

  /**
   * table column
   */
  const tableColumn = [
    {
      data: 'gratuity_name',
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
                class="btn btn-soft-warning ${editButton} waves-effect waves-light" data-uuid="${data.uuid_gratuity}"><i
                class="bx bx-edit font-size-16 align-middle"></i></button>`;
        const btnDelete = `<button type="button"
                class="btn btn-soft-danger ${deleteButton} waves-effect waves-light" data-uuid="${data.uuid_gratuity}"
                data-nama="${data.gratuity_name}"><i
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
  await renderGratuityTable();
};

export { init };
