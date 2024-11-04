/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { daftarProdukTableEl } from '../components/table/daftar-produk.js';

/**
 * import component item
 */
import { kategoriEl } from '../components/item/kategori.js';

/**
 * import component modal
 */
import { ModalDetail } from '../components/modal/detail.js';

/**
 * import repositories
 */
import { getDaftarProdukAPI, getDaftarProdukByIdAPI } from '../repositories/repositories.js';
import { getKategoriProdukAPI } from '../../kategori-produk/repositories/repositories.js';

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
const kategoriList = $(`#${attributeName()[0]['kategoriList']}`);
const searchTable = $(`#${attributeName()[0]['searchTable']}`);
const filterContainer = $(`#${attributeName()[0]['filterContainer']}`);
const detailButton = $(`.${attributeName()[0]['detailButton']}`);

/**
 * render data for table
 */
const renderTable = (tables) => {
  const tableElement = tables.map((table) => daftarProdukTableEl(table)).join('');
  $(`${table.selector} tbody`).append(tableElement);
};

/**
 * render kategori data
 */
const renderKategori = (datas) => {
  const kategoriElement = datas.map((data) => kategoriEl(data)).join('');
  kategoriList.append(kategoriElement);
};

/**
 * load data
 */
const loadData = async (keyword = null) => {
  if (isLoading) return;

  try {
    isLoading = true;
    const url =
      keyword === null
        ? urlDaftarProduk(currentPage, kategori)
        : urlSearchDaftarProduk(currentPage, keyword, kategori);
    const consumeApi = await getDaftarProdukAPI(url);
    const data = typeof consumeApi == 'undefined' ? [] : consumeApi;
    renderTable(data);
  } catch (error) {
    console.error(error);
  } finally {
    isLoading = false;
  }
};

/**
 * load kategori produk
 */
const loadKategoriProduk = async () => {
  try {
    const keyword = null;
    const consumeApi = await getKategoriProdukAPI(currentPage, keyword);
    const data = typeof consumeApi == 'undefined' ? [] : consumeApi.data;
    renderKategori(data);
  } catch (error) {
    console.error(error);
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
const renderDaftarProdukTable = async () => {
  currentPage = 1;
  $(`${table.selector} tbody`).empty();
  window.addEventListener('scroll', handleScroll);
  loadData();
  loadKategoriProduk();
};

/**
 * search data
 */
const searchDataHandler = () => {
  searchTable.on('keyup', async function () {
    const keyword = $(this).val();
    $(`${table.selector} tbody`).empty();
    loadData(keyword);
  });
};

/**
 * filter data by kategori
 */
const filterData = () => {
  let filterValue = [];
  filterContainer.on('click', `input[name="kategori[]"]`, async function () {
    const value = $(this).val();
    if (this.checked) {
      // Add the value if it is checked
      if (!filterValue.includes(value)) {
        filterValue.push(value);
      }
    } else {
      // Remove the value if it is unchecked
      filterValue = filterValue.filter((v) => v !== value);
    }
    kategori = filterValue.length === 0 ? 'all' : filterValue;
    $(`${table.selector} tbody`).empty();
    loadData();
  });
};

/**
 * detail daftar produk handler
 */
const detailDaftarProdukHandler = () => {
  table.on('click', detailButton.selector, async function () {
    const uuidItem = $(this).data('uuid');
    const data = await getDaftarProdukByIdAPI(uuidItem);
    modalDetail.modalDetailHandler(data);
  });
};

/**
 * initialize
 */
const init = async () => {
  renderDaftarProdukTable();
  searchDataHandler();
  filterData();
  detailDaftarProdukHandler();
};

export { init };
