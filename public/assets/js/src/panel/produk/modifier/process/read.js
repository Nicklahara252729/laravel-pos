/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { getModifierAPI } from '../repositories/repositories.js';

/**
 * import helpers
 */
import { TableManager } from '../../../../../helpers/TableManager.js';

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const deleteBtn = attributeName()[0]['deleteButton'];
const editBtn = attributeName()[0]['editButton'];

/**
 * render data to table
 */
const renderModifierTable = async () => {
  /**
   * load data modifier
   */
  const data = await getModifierAPI();

  /**
   * table column
   */
  const tableColumn = [
    {
      data: 'modifier_name',
    },
    {
      data: null,
      render: (data) => {
        const options = data.option;
        return options.map((option) => option.option_name).join(', ');
      },
    },
    {
      data: null,
      orderable: false,
      render: (data) => {
        return `<a href="#" class="text-primary assign-item-button" data-uuid="${data.uuid_modifier}">Assign Item</a>`;
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
        const deleteButton = `<button type="button" data-uuid="${data.uuid_modifier}" data-nama="${data.modifier_name}" class="btn btn-soft-danger ${deleteBtn} waves-effect waves-light"><i
                    class="bx bx-trash-alt font-size-16 align-middle"></i></button>`;
        const editButton = `<button type="button" data-uuid="${data.uuid_modifier}" class="btn btn-soft-warning ${editBtn} waves-effect waves-light"><i
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
  await renderModifierTable();
};

export { init };
