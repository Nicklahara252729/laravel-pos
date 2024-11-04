/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { deleteResepAPI } from '../repositories/repositories.js';

/**
 * import process
 */
import { init as readProcess } from '../process/read.js';

/**
 * defined component
 */
const tableContainer = $(`#${attributeName()[0]['tableProduk']}`);
const deleteButton = $(`#${attributeName()[0]['deleteButton']}`);

/**
 * delete resep produk handler
 */
const deleteResepProdukHandler = () => {
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
        const deleteProcess = await deleteResepAPI(uuid);
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
  deleteResepProdukHandler();
};

export { init };
