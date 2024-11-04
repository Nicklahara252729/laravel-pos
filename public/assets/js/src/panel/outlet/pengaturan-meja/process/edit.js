/**
 * import repositories
 */
import {
  updateGrupMejaAPI,
  duplicateGrupMejaAPI,
  getGrupMejaByIdAPI,
} from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';

/**
 * import process
 */
import { init as readProcess } from '../process/read.js';

/**
 * defined class
 */
const inputModal = new ModalInput();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['tableGrupMeja']}`);
const editButton = $(`#${attributeName()[0]['editButton']}`);
const duplicateButton = $(`#${attributeName()[0]['duplicateButton']}`);

/**
 * update data grup meja handler
 */
const editGrupMejaHandler = () => {
  table.on('click', editButton.selector, async function () {
    const uuid = $(this).data('uuid');
    const data = await getGrupMejaByIdAPI(uuid);
    const param = { data: data, url: updateGrupMejaAPI };
    inputModal.modalEditHandler(param);
  });
};

/**
 * duplicate grup meja handler
 */
const duplicateGrupMejaHandler = () => {
  table.on('click', duplicateButton, function (event) {
    const nama = $(this).data('nama');
    const uuid = $(this).data('uuid');
    const confirmMessage = textConfirmDuplicate(nama);
    swalConfirmation(
      {
        message: confirmMessage,
        title: 'duplicate',
      },
      async () => {
        const duplicateProcess = await duplicateGrupMejaAPI(uuid);
        if (duplicateProcess.status) {
          swalSuccess(duplicateProcess.message, readProcess);
        }
      }
    );
  });
};

/**
 * initialize
 */
const init = () => {
  editGrupMejaHandler();
  duplicateGrupMejaHandler();
};

export { init };
