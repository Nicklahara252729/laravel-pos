/**
 * import repositories
 */
import { updateDaftarOutletAPI, getDaftarOutletByIdAPI } from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component widget
 */
import { setDropify } from '../components/widget/dropify.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';

/**
 * defined class
 */
const daftarOutletModal = new ModalInput();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const editButton = $(`.${attributeName()[0]['editButton']}`);

/**
 * edit daftar outlet handler
 */
const editDaftarOutletHandler = () => {
  table.on('click', editButton.selector, async function () {
    setDropify();
    const uuidOutlet = $(this).data('uuid');
    const param = {
      url: updateDaftarOutletAPI(uuidOutlet),
      dataOutlet: await getDaftarOutletByIdAPI(uuidOutlet),
    };
    daftarOutletModal.modalEditHandler(param);
  });
};

/**
 * initialize event listener
 */
const init = () => {
  editDaftarOutletHandler();
};

export { init };
