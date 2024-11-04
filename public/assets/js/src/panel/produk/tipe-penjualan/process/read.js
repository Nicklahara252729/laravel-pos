/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { getTipePenjualanAPI } from '../repositories/repositories.js';

/**
 * import helper
 */
import { TableManager } from '../../../../../helpers/TableManager.js';

/**
 * defiend component
 */
const table = $(`#${attributeName()[0]['table']}`);

/**
 * data tipe penjualan
 */
const renderTipePenjualanTable = async () => {
  /**
   * load data discount
   */
  const data = await getTipePenjualanAPI();

  /**
   * table column
   */
  const tableColumn = [
    {
      data: 'sales_type_name',
    },
    {
      data: null,
      render: (data) => `${data.gratuity_name}`,
    },
    {
      data: null,
      render: (data) => {
        const activeColor = data.sales_status == 'active' ? 'text-success' : 'text-danger';
        const activeText = data.sales_status == 'active' ? 'Aktif' : 'Tidak Aktif';
        return `<span class='${activeColor}'> ${activeText} </span>`;
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
        const deleteButton = `<button type="button" data-uuid="${data.uuid_sales_type}" data-nama="${data.sales_type_name}" class="btn btn-soft-danger delete-button waves-effect waves-light"><i
                class="bx bx-trash-alt font-size-16 align-middle"></i></button>`;
        const editButton = `<button type="button" data-uuid="${data.uuid_sales_type}" class="btn btn-soft-warning edit-button waves-effect waves-light"><i
                class="bx bx-edit font-size-16 align-middle"></i></button>`;
        return [editButton, deleteButton].join('');
      },
    },
  ];

  new TableManager(table.selector, data, tableColumn, tableButton, {
    rowCallback: true,
    tableClear: true,
    tableAdjust: true,
  });
};

/**
 * initialize
 */
const init = async () => {
  await renderTipePenjualanTable();
};

export { init };
