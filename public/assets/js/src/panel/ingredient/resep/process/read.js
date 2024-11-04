/**
 * import component table
 */
import { produkTableElement } from '../components/table/produk.js';
import { halfRawTableElement } from '../components/table/half-raw.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component modal
 */
import { ModalDetail } from '../components/modal/detail.js';

/**
 * import repositories
 */
import { getResepAPI, getResepByIdAPI } from '../repositories/repositories.js';

/**
 * defined class
 */
const modalDetail = new ModalDetail();

/**
 * defined component
 */
const tableProduk = attributeName()[0]['tableProduk'];
const tableBahanSetengahJadi = attributeName()[0]['tableBahanSetengahJadi'];
const detailButton = $(`#${attributeName()[0]['detailButton']}`);
const searchResep = $(`#${attributeName()[0]['searchResep']}`);

/**
 * get data
 */
const renderResep = async (type, keyword = null) => {
  /**
   * set type to local storage
   */
  const getType = JSON.parse(localStorage.getItem('tipeResep'));
  type = typeof type == 'undefined' ? getType : type;
  localStorage.setItem('tipeResep', JSON.stringify(type));

  /**
   * consume api
   */
  const tableIdName = type === 'produk' ? tableProduk : tableBahanSetengahJadi;
  $(`#${tableIdName} tbody`).empty();
  const url = type === 'produk' ? urlProduk(keyword) : urlHalfRaw(keyword);
  const data = await getResepAPI(url);

  /**
   * tabel item
   */
  const dataList = typeof data == 'undefined' ? [] : data;
  const tableElement = dataList
    .map((tableItems) => {
      return type === 'produk' ? produkTableElement(tableItems) : halfRawTableElement(tableItems);
    })
    .join('');
  $(`#${tableIdName}`).append(tableElement);
};

/**
 * detail process handler
 */
const detailProcessHandler = (data) => {
  modalDetail.modalDetailHandler(data);
};

/**
 * detail resep produk handler
 */
const detailResepProdukHandler = (type) => {
  const tableIdName = type === 'produk' ? tableProduk : tableBahanSetengahJadi;
  $(`#${tableIdName}`).on('click', detailButton.selector, async function () {
    const uuid = $(this).data('uuid');
    const data = await getResepByIdAPI(uuid);
    detailProcessHandler(data);
  });
};

/**
 * search data
 */
const searchDataHandler = (type) => {
  searchResep.on('keyup', async function () {
    const keyword = $(this).val();
    renderResep(type, keyword);
  });
};

/**
 * initialize
 */
const init = async (type) => {
  await renderResep(type);
  detailResepProdukHandler(type);
  searchDataHandler(type);
};

export { init, renderResep, detailResepProdukHandler, searchDataHandler };
