/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { deleteDaftarOutletAPI } from '../repositories/repositories.js';

/**
 * import process
 */
import { init as readProcess } from '../process/read.js';

/**
 * defined component
 */
const tableContainer = $(`#${attributeName()[0]['table']}`);
const deleteButton = $(`.${attributeName()[0]['deleteButton']}`);

/**
 * delete daftar outlet handler
 */
const deleteDaftarOutletHanlder = () => {
  tableContainer.on('click', deleteButton.selector, function (event) {
    const target = $(this);

    // Check if the clicked element is a delete button inside the DataTable
    const uuidOutlet = target.data('uuid');
    const nama = target.data('nama');
    const deleteMessage = textConfirmDelete(nama);
    swalConfirmation(
      {
        message: deleteMessage,
        title: 'delete',
      },
      async () => {
        const deleteProcess = await deleteDaftarOutletAPI(uuidOutlet);
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
  deleteDaftarOutletHanlder();
};

export { init };
