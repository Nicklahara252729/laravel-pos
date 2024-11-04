/**
 * import repositories
 */
import { updatePaketBundleAPI, getPaketBundleByIdAPI } from '../repositories/repositories.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component widget
 */
import { setDropify } from '../components/widget/dropify.js';

/**
 * defined class
 */
const paketBundleModal = new ModalInput();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const editButton = $(`.${attributeName()[0]['editButton']}`);

/**
 * edit paket bundle handler
 */
const editPaketBundleHandler = () => {
  table.on('click', editButton.selector, async function () {
    setDropify();
    const uuid = $(this).data('uuid');
    const param = { url: updatePaketBundleAPI(uuid), data: await getPaketBundleByIdAPI(uuid) };
    paketBundleModal.modalEditHandler(param);
  });
};

/**
 * initalize
 */
const init = async () => {
  editPaketBundleHandler();
};

export { init };
