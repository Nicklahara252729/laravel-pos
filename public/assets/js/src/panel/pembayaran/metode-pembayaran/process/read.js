/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { metodePembayaranTableElement } from '../components/table/metode-pembayaran.js';

/**
 * import component modal
 */
import { ModalDetail } from '../components/modal/detail.js';

/**
 * import repositories
 */
import {
  getMetodePembayaranAPI,
  getMetodePembayaranByIdAPI,
} from '../repositories/repositories.js';

/**
 * defined default value
 */
let currentPage = 1;
let isLoading = false;

/**
 * defined class
 */
const modalDetail = new ModalDetail();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const detailButton = $(`.${attributeName()[0]['detailButton']}`);
const searchKonfigurasi = $(`#${attributeName()[0]['searchKonfigurasi']}`);

/**
 * render data for table
 */
const renderTable = (tables) => {
  table.empty();
  const tableElement = tables.map((table) => metodePembayaranTableElement(table)).join('');
  table.append(tableElement);
};

/**
 * load data
 */
const loadData = async () => {
  if (isLoading) return;

  try {
    isLoading = true;
    const consumeApi = await getMetodePembayaranAPI(currentPage);
    const data = typeof consumeApi == 'undefined' ? [] : consumeApi;
    renderTable(data);
  } catch (error) {
    console.error(error);
  } finally {
    isLoading = false;
  }
};

/**
 * handle data where scrolling
 */
const handleScroll = () => {
  const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
  if (scrollTop + clientHeight >= scrollHeight - 5 && !isLoading) {
    currentPage++;
    loadData();
  }
};

/**
 * render table
 */
const renderKategoriTable = async () => {
  currentPage = 1;
  table.empty();
  window.addEventListener('scroll', handleScroll);
  loadData();
};

/**
 * render detail handler
 */
const detailMetodePembayaranHandler = () => {
  table.on('click', detailButton.selector, async function () {
    const uuid = $(this).data('uuid');
    const param = { data: await getMetodePembayaranByIdAPI(uuid) };
    modalDetail.modalDetailMetodePembayaran(param);
  });
};

/**
 * search data handler
 */
const searchDataHandler = () => {
  searchKonfigurasi.on('keyup', async function () {
    const keyword = $(this).val();
    loadData(keyword);
  });
};

/**
 * initialize
 */
const init = async () => {
  renderKategoriTable();
  detailMetodePembayaranHandler();
  searchDataHandler();
};

export { init };
