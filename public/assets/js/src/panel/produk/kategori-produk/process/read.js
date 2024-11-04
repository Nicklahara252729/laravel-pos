/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { kategoriTableElement } from '../components/table/kategori.js';

/**
 * import component modal
 */
import { ModalDetail } from '../components/modal/detail.js';

/**
 * import repositories
 */
import { getKategoriProdukAPI, getKategoriProdukByIdAPI } from '../repositories/repositories.js';

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
const searchKategoriProduk = $(`#${attributeName()[0]['searchKategoriProduk']}`);

/**
 * render data for table
 */
const renderTable = (tables) => {
  table.empty();
  const tableElement = tables.map((table) => kategoriTableElement(table)).join('');
  table.append(tableElement);
};

/**
 * load data
 */
const loadData = async (keyword = null) => {
  if (isLoading) return;

  try {
    isLoading = true;
    const consumeApi = await getKategoriProdukAPI(currentPage, keyword);
    const data = typeof consumeApi == 'undefined' ? [] : consumeApi.data;
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
 * render detail kategori produk handler
 */
const detailKategoriHandler = () => {
  table.on('click', detailButton.selector, async function () {
    const uuid = $(this).data('uuid');
    const data = await getKategoriProdukByIdAPI(uuid);
    modalDetail.modalDetailKategoriProduk(data);
  });
};

/**
 * search data handler
 */
const searchDataHandler = () => {
  searchKategoriProduk.on('keyup', async function () {
    const keyword = $(this).val();
    loadData(keyword);
  });
};

/**
 * initialize
 */
const init = async () => {
  renderKategoriTable();
  detailKategoriHandler();
  searchDataHandler();
};

export { init };
