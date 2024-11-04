/**
 * import repositories
 */
import {
  rejectPOAPI,
  riwayatPOByIdAPI,
  getPOByIdAPI,
  hentikanPemenuhanAPI,
} from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component modal
 */
import { ModalStopPemenuhan } from '../components/modal/stop-pemenuhan.js';
import { ModalReject } from '../components/modal/reject.js';

/**
 * defined class
 */
const rejectModal = new ModalReject();
const stopPemenuhanModal = new ModalStopPemenuhan();

/**
 * defined component
 */
const modalUpdate = $(`#${attributeName()[0]['modalUpdate']}`);
const rejectButton = $(`#${attributeName()[0]['rejectButton']} a`);
const hentikanPemenuhanButton = $(`#${attributeName()[0]['hentikanPemenuhanButton']}`);

/**
 * reject modal handler
 */
const rejectHandler = () => {
  modalUpdate.on('click', rejectButton.selector, function (event) {
    const uuid = localStorage.getItem('uuidPO');
    const type = $(this).data('action');
    const param = { url: rejectPOAPI(uuid), type: type };
    rejectModal.modalRejectHandler(param);
  });
};

/**
 * stop pemenuhan modal handler
 */
const stopPemenuhanHandler = () => {
  hentikanPemenuhanButton.on('click', async () => {
    const uuid = localStorage.getItem('uuidPO');
    const param = {
      data: await getPOByIdAPI(uuid),
      riwayat: await riwayatPOByIdAPI(uuid),
      url: hentikanPemenuhanAPI(uuid),
    };
    stopPemenuhanModal.modalStopPemenuhanHandler(param);
  });
};

/**
 * Initializes event listener
 */
const init = () => {
  rejectHandler();
  stopPemenuhanHandler();
};

export { init };
