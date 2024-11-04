/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { paketBundleTableElement } from '../components/table/promo-produk.js';

/**
 * import component modal
 */
import { ModalDetail } from '../components/modal/detail.js';

/**
 * import repositories
 */
import { getPromoProdukAPI, getPromoProdukByIdAPI } from '../repositories/repositories.js';

/**
 * defined default value
 */
let currentPage = 1;
let isLoading = false;
let kategori = 'all';

/**
 * defined class
 */
const modalDetail = new ModalDetail();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const searchPromo = $(`#${attributeName()[0]['searchPromo']}`);
const filterButton = $(`#${attributeName()[0]['filterButton']}`);
const detailButton = $(`.${attributeName()[0]['detailButton']}`);

/**
 * render data for table
 */
const renderTable = (tables) => {
  const tableElement = tables.map((table) => paketBundleTableElement(table)).join('');
  table.append(tableElement);
};

/**
 * load data
 */
const loadData = async (keyword = null) => {
  if (isLoading) return;

  try {
    isLoading = true;
    const url = urlDataPromoProduk(currentPage, keyword, kategori);
    const consumeApi = await getPromoProdukAPI(url);
    const data = typeof consumeApi.data == 'undefined' ? [] : consumeApi.data;
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
const renderPromoProdukTable = async () => {
  currentPage = 1;
  table.empty();
  window.addEventListener('scroll', handleScroll);
  loadData();
};

/**
 * search data
 */
const searchDataHandler = () => {
  searchPromo.on('keyup', async function () {
    const keyword = $(this).val();
    table.empty();
    loadData(keyword);
  });
};

/**
 * filter data by kategori
 */
const filterData = () => {
  $(`${filterButton.selector} div a`).on('click', async function () {
    const filterValue = $(this).data('filter');
    kategori = filterValue;
    const kategoriText =
      filterValue === 'active' ? 'Aktif' : filterValue === 'all' ? 'Semua Kategori' : 'Tidak Aktif';
    table.empty();
    $(`${filterButton.selector} button span`).text(kategoriText);
    loadData();
  });
};

/**
 * render detail promo produk handler
 */
const detailPromoProdukHandler = () => {
  table.on('click', detailButton.selector, async function () {
    const uuid = $(this).data('uuid');
    const param = { data: await getPromoProdukByIdAPI(uuid) };
    modalDetail.modalDetailPromoProdukHandler(param);
  });
};

/**
 * initialize
 */
const init = async () => {
  renderPromoProdukTable();
  searchDataHandler();
  filterData();
  detailPromoProdukHandler();
};

export { init };
