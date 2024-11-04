/**
 * import repositories
 */
import { getDaftarPegawaiAPI } from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import helper
 */
import { TableManager } from '../../../../../helpers/TableManager.js';

/**
 * defined component
 */
const table = $(`${attributeName()[0]['table']}`);
const filterData = $(`#${attributeName()[0]['filterData']}`);

/**
 * render data employee table handler
 */
const rendetDaftarPegawaiTable = async (type) => {
  /**
   * getting data
   */
  const data = await getDaftarPegawaiAPI(type);

  /**
   * table column
   */
  const tableColumn = [
    {
      width: '250px',
      data: null,
      render: (data) => {
        return `<div class="d-flex title align-items-center">
              <img src="${data.profile_photo_path}" class="avatar-sm rounded-circle img-thumbnail" alt="">
              <div class="flex-1 ms-2 ps-1">
                  <span>${data.name}</span>
              </div>
          </div>`;
      },
    },
    {
      width: '150px',
      data: 'access_name',
    },
    {
      width: '150px',
      data: 'email',
    },
    {
      width: '150px',
      data: 'phone',
    },
  ];

  /**
   * table button
   */
  const tableButton = [
    {
      width: '97.5%',
      data: null,
      sClass: 'text-center flex justify-center gap-1',
      orderable: false,
      render: (data) => {
        const nonactiveButton = `<button type="button" data-nama="${data.name}" data-uuid="${
          data.uuid_user
        }" class="btn btn-soft-danger ${
          attributeName()[0]['nonactiveButton']
        } waves-effect waves-light"><i
              class="bx bx bx-user-x font-size-16 align-middle"></i></button>`;
        const editButton = `<button type="button" data-uuid="${
          data.uuid_user
        }" class="btn btn-soft-warning ${
          attributeName()[0]['editButton']
        } waves-effect waves-light"><i
              class="bx bx-edit font-size-16 align-middle"></i></button>`;
        const pinAksesButton = `<button type="button" data-uuid="${
          data.uuid_user
        }" class="btn btn-soft-primary ${
          attributeName()[0]['pinAccessButton']
        } waves-effect waves-light"><i
              class="bx bx bx-lock-alt font-size-16 align-middle"></i></button>`;
        const changePasswordButton = `<button type="button" data-uuid="${
          data.uuid_user
        }" class="btn btn-soft-dark ${
          attributeName()[0]['changePasswordButton']
        } waves-effect waves-light"><i
        class="bx bx-key font-size-16 align-middle"></i></button>`;
        const restoreButton = `<button type="button" data-nama="${data.name}" data-uuid="${
          data.uuid_user
        }" class="btn btn-soft-primary ${
          attributeName()[0]['restoreButton']
        } waves-effect waves-light"><i
        class="bx bx-reset font-size-16 align-middle"></i></button>`;
        const deletePermanentButton = `<button type="button" data-nama="${data.name}" data-uuid="${
          data.uuid_user
        }" class="btn flex items-center btn-soft-danger ${
          attributeName()[0]['deletePermanentButton']
        } waves-effect waves-light"><i
        class="bx bx-trash-alt font-size-16 align-middle"></i></button>`;
        return type == 'active'
          ? [editButton, pinAksesButton, nonactiveButton, changePasswordButton].join('')
          : [restoreButton, deletePermanentButton].join('');
      },
    },
  ];

  new TableManager(`#${table.selector}`, data, tableColumn, tableButton, {
    rowCallback: true,
    tableClear: true,
    tableAdjust: true,
  });
};

/**
 * initialize
 */
const init = async () => {
  document.getElementById(table).removeAttribute('style');
  filterData.text('Filter status : Aktif');
  await rendetDaftarPegawaiTable('active');
};

export { init, rendetDaftarPegawaiTable };
