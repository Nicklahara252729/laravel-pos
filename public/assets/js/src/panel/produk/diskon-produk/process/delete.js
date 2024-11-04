/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { deleteDiskonProdukAPI } from '../repositories/repositories.js';

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
 * delete diskon produk handler
 */
const deleteDiskonProdukHandler = () => {
  tableContainer.on('click', deleteButton.selector, function (event) {
    const target = $(this);
    const uuidDiscount = target.data('uuid');
    const nama = target.data('nama');
    const deleteMessage = textConfirmDelete(nama);
    swalConfirmation(
      {
        message: deleteMessage,
        title: 'delete',
      },
      async () => {
        const deleteProcess = await deleteDiskonProdukAPI(uuidDiscount);
        if (deleteProcess.status) {
          swalSuccess(deleteProcess.message, readProcess);
        }
      }
    );
  });
};

/**
 * initialize
 */
const init = () => {
  deleteDiskonProdukHandler();
};

export { init };
