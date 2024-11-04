/**
 * import repositories
 */
import { savePaketBundleAPI } from '../repositories/repositories.js';
import { getDaftarOutletAPI } from '../../../profile/daftar-outlet/repositories/repositories.js';
import { getDaftarProdukAPI } from '../../daftar-produk/repositories/repositories.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';
import { ModalAssignOutlet } from '../components/modal/assign-outlet.js';
import { ModalAssignItem } from '../components/modal/assign-item.js';

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
const assignOutletModal = new ModalAssignOutlet();
const assignItemModal = new ModalAssignItem();

/**
 * defined component
 */
const addButton = $(`#${attributeName()[0]['addButton']}`);
const dropify = $(`.${attributeName()[0]['dropify']}`);
const assignOutletButton = $(`#${attributeName()[0]['assignOutletButton']}`);
const itemBundleButton = $(`#${attributeName()[0]['itemBundleButton']}`);

/**
 * modal add paket bundle handler
 */
const addPaketBundleHandler = () => {
  addButton.on('click', () => {
    setDropify(dropify.selector);
    paketBundleModal.modalAddHandler(savePaketBundleAPI());
  });
};

/**
 * render item assign handler
 */
const outletAssignHandler = () => {
  assignOutletButton.on('click', async function () {
    const param = { dataOutlet: await getDaftarOutletAPI() };
    assignOutletModal.openModalHandler(param);
  });
};

/**
 * render item assign handler
 */
const itemAssignHandler = () => {
  itemBundleButton.on('click', async function () {
    const url = urlDaftarProduk(1, 'all');
    const param = { dataProduk: await getDaftarProdukAPI(url) };
    assignItemModal.openModalHandler(param);
  });
};

/**
 * initialize
 */
const init = () => {
  addPaketBundleHandler();
  outletAssignHandler();
  itemAssignHandler();
};

export { init };
