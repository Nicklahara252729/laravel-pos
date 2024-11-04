/**
 * import compoennt attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { deleteGrupMejaAPI } from '../repositories/repositories.js';

/**
 * import process
 */
import { init as readProcess } from '../process/read.js';

/**
 * defined component
 */
const tableContainer = $(`#${attributeName()[0]['tableGrupMeja']}`);
const deleteButton = $(`#${attributeName()[0]['deleteButton']}`);

/**
 * delete grup meja handler
 */
const deleteGrupMejaHandler = () => {
  tableContainer.on('click', deleteButton.selector, function (event) {
    const target = $(this);
    const uuid = target.data('uuid');
    const nama = target.data('nama');
    const deleteMessage = textConfirmDelete(nama);
    swalConfirmation(
      {
        message: deleteMessage,
        title: 'delete',
      },
      async () => {
        const deleteProcess = await deleteGrupMejaAPI(uuid);
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
  deleteGrupMejaHandler();
};

export { init };
