/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { deleteDaftarPegawaiAPI, nonactiveDaftarPegawaiAPI } from '../repositories/repositories.js';

/**
 * import process
 */
import { init as readProcess } from '../process/read.js';

/**
 * defined component
 */
const tableContainer = $(`#${attributeName()[0]['table']}`);
const nonactiveButton = $(`.${attributeName()[0]['nonactiveButton']}`);
const deletePermanentButton = $(`.${attributeName()[0]['deletePermanentButton']}`);

/**
 * nonactive data handler
 */
const nonactiveEmployeeHandler = () => {
  tableContainer.on('click', nonactiveButton.selector, function (event) {
    const target = $(this);
    const uuidUser = target.data('uuid');
    const nama = target.data('nama');
    const nonactiveMessage = textConfirmNonaktif(nama);
    swalConfirmation(
      {
        message: nonactiveMessage,
        title: 'nonactive',
      },
      async () => {
        const deleteProcess = await nonactiveDaftarPegawaiAPI(uuidUser);
        if (deleteProcess.status) {
          swalSuccess(deleteProcess.message, readProcess);
        }
      }
    );
  });
};

/**
 * delete data permanent handler
 */
const deleteEmployeeHandler = () => {
  tableContainer.on('click', deletePermanentButton.selector, function (event) {
    const target = $(this);
    const uuidUser = target.data('uuid');
    const nama = target.data('nama');
    const deleteMessage = textConfirmDelete(nama);
    swalConfirmation(
      {
        message: deleteMessage,
        title: 'delete',
      },
      async () => {
        const deleteProcess = await deleteDaftarPegawaiAPI(uuidUser);
        if (deleteProcess.status) {
          swalSuccess(deleteProcess.message, readProcess);
        }
      }
    );
  });
};

/**
 * initiazlie
 */
const init = () => {
  nonactiveEmployeeHandler();
  deleteEmployeeHandler();
};

export { init };
