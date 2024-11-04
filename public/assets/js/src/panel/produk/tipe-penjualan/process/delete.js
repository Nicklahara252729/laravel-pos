/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { deleteTipePenjualanAPI } from '../repositories/repositories.js';

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
 * delete tipe penjualan handler
 */
const deleteTipePenjualanHandler = () => {
  tableContainer.on('click', deleteButton.selector, function (event) {
    const target = $(this);
    const uuidSalesType = target.data('uuid');
    const nama = target.data('nama');
    const deleteMessage = textConfirmDelete(nama);
    swalConfirmation(
      {
        message: deleteMessage,
        title: 'delete',
      },
      async () => {
        const deleteProcess = await deleteTipePenjualanAPI(uuidSalesType);
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
  deleteTipePenjualanHandler();
};

export { init };
