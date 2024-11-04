/**
 * import component
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { getDaftarOutletAPI } from '../repositories/repositories.js';

/**
 * import helper
 */
import { TableManager } from '../../../../../helpers/TableManager.js';

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);

/**
 * render daftar outlet table handler
 */
const renderDaftarOutletTable = async () => {
  /**
   * load data outlet
   */
  const data = await getDaftarOutletAPI();

  /**
   * table column
   */
  const tableColumn = [
    {
      width: '250px',
      data: null,
      render: (data) => {
        return `<div class="d-flex title align-items-center">
              <img src="${data.logo}" class="avatar-sm rounded-circle img-thumbnail" alt="">
              <div class="flex-1 ms-2 ps-1">
                  <a href="" class="text-dark mb-0">${data.outlet_name}</a>
              </div>
          </div>`;
      },
    },
    {
      data: 'address',
    },
    {
      data: 'phone_number',
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
        const deleteButton = `<button type="button" data-uuid="${data.uuid_outlet}" data-nama="${
          data.outlet_name
        }" class="btn btn-soft-danger ${
          attributeName()[0]['deleteButton']
        } waves-effect waves-light"><i
                  class="bx bx-trash-alt font-size-16 align-middle"></i></button>`;
        const editButton = `<button type="button" data-uuid="${
          data.uuid_outlet
        }" class="btn btn-soft-warning ${
          attributeName()[0]['editButton']
        } waves-effect waves-light"><i
                  class="bx bx-edit font-size-16 align-middle"></i></button>`;
        return [editButton, deleteButton].join(' ');
      },
    },
  ];

  new TableManager(table.selector, data, tableColumn, tableButton, {
    rowCallback: false,
    tableClear: false,
    tableAdjust: false,
  });
};

/**
 * render outlet table
 */
const init = async () => {
  await renderDaftarOutletTable();
};

export { init };
