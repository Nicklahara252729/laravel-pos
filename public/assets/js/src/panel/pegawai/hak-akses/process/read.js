/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { getHakAksesAPI } from '../repositories/repositories.js';

/**
 * import helper
 */
import { TableManager } from '../../../../../helpers/TableManager.js';

/**
 * defined component
 */
const editBtn = $(`${attributeName()[0]['editButton']}`);
const deleteBtn = $(`${attributeName()[0]['deleteButton']}`);
const table = $(`#${attributeName()[0]['table']}`);

/**
 * render hak akses table handler
 */
const renderHakAksesTable = async () => {
  /**
   * getting data
   */
  const data = await getHakAksesAPI();

  /**
   * table column
   */
  const tableColumn = [
    {
      data: 'access_name',
    },
    {
      data: null,
      sClass: 'text-center',
      render: (data) => {
        return `${data.jumlah_pegawai} Pegawai`;
      },
    },
    {
      data: 'platform',
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
        const deleteButton = `<button type="button" data-uuid="${data.uuid_access}" data-nama="${data.access_name}" class="btn btn-soft-danger ${deleteBtn.selector} waves-effect waves-light"><i
                  class="bx bx-trash-alt font-size-16 align-middle"></i></button>`;
        const editButton = `<button type="button" data-uuid="${data.uuid_access}" class="btn btn-soft-warning ${editBtn.selector} waves-effect waves-light"><i class="bx bx-edit font-size-16 align-middle"></i></button>`;
        return [editButton, deleteButton].join(' ');
      },
    },
  ];

  new TableManager(`${table.selector}`, data, tableColumn, tableButton, {
    rowCallback: false,
    tableClear: true,
    tableAdjust: true,
  });
};

/**
 * initialize
 */
const init = async () => {
  await renderHakAksesTable();
};

export { init };
