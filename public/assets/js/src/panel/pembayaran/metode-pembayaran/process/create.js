/**
 * impor repositories
 */
import { saveMetodePembayaranAPI, getPaymentListAPI } from '../repositories/repositories.js';
import { getDaftarOutletAPI } from '../../../profile/daftar-outlet/repositories/repositories.js';

/**
 * import compnent modal
 */
import { ModalInput } from '../components/modal/input.js';
import { ModalAssignOutlet } from '../components/modal/assign-outlet.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined class
 */
const metodePembayarnaModal = new ModalInput();
const assignOutletModal = new ModalAssignOutlet();

/**
 * defined component
 */
const addButton = $(`#${attributeName()[0]['addButton']}`);
const assignOutletButton = $(`#${attributeName()[0]['assignOutletButton']}`);

/**
 * modal add metode pembayaran handler
 */
const addMetodePembayaranHandler = () => {
  addButton.on('click', async function () {
    const param = { url: saveMetodePembayaranAPI(), paymentList: await getPaymentListAPI() };
    metodePembayarnaModal.modalAddHandler(param);
  });
};

/**
 * render item assign handler
 */
const outletAssignHandler = () => {
  assignOutletButton.on('click', async function () {
    const param = { outlet: await getDaftarOutletAPI() };
    assignOutletModal.openModalHandler(param);
  });
};

/**
 * initialize
 */
const init = () => {
  addMetodePembayaranHandler();
  outletAssignHandler();
};

export { init };
