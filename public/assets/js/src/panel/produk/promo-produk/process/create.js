/**
 * import repositories
 */
import { savePromoProdukAPI } from '../repositories/repositories.js';
import { getTipePenjualanAPI } from '../../tipe-penjualan/repositories/repositories.js';
import { getDaftarOutletAPI } from '../../../profile/daftar-outlet/repositories/repositories.js';
import { getDaftarProdukAPI } from '../../daftar-produk/repositories/repositories.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';
import { ModalAssignOutlet } from '../components/modal/assign-outlet.js';
import { ModalAssignItem } from '../components/modal/assign-item.js';
import { ModalTipePenjualan } from '../components/modal/assign-tipe-penjualan.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined class
 */
const promoProdukModal = new ModalInput();
const assignOutletModal = new ModalAssignOutlet();
const assignItemModal = new ModalAssignItem();
const assignTipePenjualanModal = new ModalTipePenjualan();

/**
 * defined default value
 */
let syaratPromoValue = '';

/**
 * defined component
 */
const syaratPromoContainer = $(`#${attributeName()[0]['syaratPromoContainer']}`);
const addButton = $(`#${attributeName()[0]['addButton']}`);
const assignOutletButton = $(`#${attributeName()[0]['assignOutletButton']}`);
const assignItemButton = $(`#${attributeName()[0]['assignItemButton']}`);
const containerCertain = $(`#${attributeName()[0]['containerCertain']}`);
const assignTipePenjualanButton = $(`#${attributeName()[0]['assignTipePenjualanButton']}`);

/**
 * get syarat promo value
 */
const getSyaratPromoValue = () => {
  $(`${syaratPromoContainer.selector} div input[name="syarat_promo"]`).change(function () {
    const value = $(this).val();
    syaratPromoValue = value;
  });
};

/**
 * modal add promo produk handler
 */
const addPromoProdukHandler = () => {
  $('#atur-waktu').daterangepicker();
  flatpickr('#start-time', {
    enableTime: !0,
    noCalendar: !0,
    dateFormat: 'H:i',
  });
  flatpickr('#end-time', {
    enableTime: !0,
    noCalendar: !0,
    dateFormat: 'H:i',
  });
  addButton.on('click', () => {
    promoProdukModal.modalAddHandler(savePromoProdukAPI());
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
  assignItemButton.on('click', async function () {
    const url = urlDaftarProduk(1, 'all');
    const param = { syaratPromoValue: syaratPromoValue, dataProduk: await getDaftarProdukAPI(url) };
    assignItemModal.openModalHandler(param);
  });
};

/**
 * render tipe penjualan assign handler
 */
const tipePenjualanAssignHandler = () => {
  containerCertain.on('click', assignTipePenjualanButton.selector, async function (event) {
    const param = { dataSalesType: await getTipePenjualanAPI() };
    assignTipePenjualanModal.openModalHandler(param);
  });
};

/**
 * initialize
 */
const init = () => {
  addPromoProdukHandler();
  outletAssignHandler();
  itemAssignHandler();
  tipePenjualanAssignHandler();
  getSyaratPromoValue();
};

export { init };
