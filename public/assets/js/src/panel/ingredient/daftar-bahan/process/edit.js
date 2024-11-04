/**
 * import repositories
 */
import { updateDaftarBahanAPI, getDaftarBahanByIdAPI } from '../repositories/repositories.js';

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
const daftarBahanModal = new ModalInput();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const editButton = $(`.${attributeName()[0]['editButton']}`);

/**
 * edit data handler
 */
const editDaftarBahanHandler = () => {
  table.on('click', editButton.selector, async function () {
    setDropify();
    const uuid = $(this).data('uuid');
    const getDaftarBahan = await getDaftarBahanByIdAPI(uuid);
    const title = 'Edit bahan setengah jadi';
    const param = {
      url: updateDaftarBahanAPI(uuid),
      getDaftarBahan: getDaftarBahan,
      title: title,
    };
    daftarBahanModal.modalEditHandler(param);
  });
};

/**
 * initalize
 */
const init = async () => {
  editDaftarBahanHandler();
};

export { init };
