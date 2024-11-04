/**
 * import repositories
 */
import {
  saveDaftarProdukAPI,
  exportDaftarProdukAPI,
  importDaftarProdukAPI,
} from '../repositories/repositories.js';
import { getKategoriProdukAPI } from '../../kategori-produk/repositories/repositories.js';
import { getTipePenjualanAPI } from '../../tipe-penjualan/repositories/repositories.js';
import { getModifierAPI } from '../../modifier/repositories/repositories.js';

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
import { ModalImport } from '../components/modal/import.js';
import { ModalVariant } from '../components/modal/variant.js';
import { ModalStock } from '../components/modal/stock.js';
import { ModalHpp } from '../components/modal/hpp.js';

/**
 * defined class
 */
const daftarProdukModal = new ModalInput();
const importModal = new ModalImport();
const variantModal = new ModalVariant();
const stockModal = new ModalStock();
const hppModal = new ModalHpp();

/**
 * defined API
 */
const dataTipePenjualan = await getTipePenjualanAPI();
const dataKategoriProduk = await getKategoriProdukAPI(1, null);
const dataModifier = await getModifierAPI();

/**
 * defined component
 */
const addButton = $(`#${attributeName()[0]['addButton']}`);
const dropify = $(`.${attributeName()[0]['dropify']}`);
const exportButton = $(`#${attributeName()[0]['exportButton']}`);
const variantInputContainer = $(`#${attributeName()[0]['variantInputContainer']}`);
const stockInputContainer = $(`#${attributeName()[0]['stockInputContainer']}`);
const hppInputContainer = $(`#${attributeName()[0]['hppInputContainer']}`);

/**
 * add daftar produk modal handler
 */
const addDaftarProdukHandler = async () => {
  addButton.on('click', () => {
    setDropify(dropify.selector);
    localStorage.setItem('alvaDaftarProdukVariant', 0);
    const param = {
      urlSaveProduk: saveDaftarProdukAPI(),
      dataKategoriProduk: dataKategoriProduk.data,
      dataTipePenjualan: dataTipePenjualan,
      dataModifier: dataModifier,
    };
    daftarProdukModal.modalAddHandler(param);
  });
};

/**
 * export handler
 */
const exportDaftarProdukHandler = () => {
  exportButton.on('click', `a`, function (event) {
    const action = $(this).data('action');
    if (action === 'export') {
      const uuidOutlet = getDefaultOutletUuid();
      const exportProcess = exportDaftarProdukAPI(uuidOutlet);
      window.open(exportProcess, '_blank');
    } else {
      setDropify(dropify.selector);
      importModal.modalImportHandler(importDaftarProdukAPI());
    }
  });
};

/**
 * variant product handler
 */
const variantProductHandler = () => {
  $(`${variantInputContainer.selector} :button`).on('click', function (event) {
    variantModal.addModalHandler(dataTipePenjualan);
  });
};

/**
 * stock handler
 */
const stockHandler = () => {
  $(`${stockInputContainer.selector} :button`).on('click', function (event) {
    stockModal.addModalHandler();
  });
};

/**
 * hpp handler
 */
const hppHandler = () => {
  $(`${hppInputContainer.selector} :button`).on('click', function (event) {
    hppModal.addModalHandler();
  });
};

/**
 * initialize
 */
const init = () => {
  addDaftarProdukHandler();
  exportDaftarProdukHandler();
  variantProductHandler();
  stockHandler();
  hppHandler();
};

export { init };
