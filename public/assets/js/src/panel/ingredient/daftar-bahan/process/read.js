/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { daftarBahanElement } from '../components/table/daftar-bahan.js';

/**
 * import component modal
 */
import { ModalDetail } from '../components/modal/detail.js';

/**
 * import component item
 */
import { kategoriEl } from '../components/item/kategori.js';

/**
 * import repositories
 */
import { getDaftarBahanAPI, getDaftarBahanByIdAPI } from '../repositories/repositories.js';
import { getKategoriBahanAPI } from '../../kategori-bahan/repositories/repositories.js';

/**
 * defined default value
 */
let currentPage = 1;
let isLoading = false;
let tipeBahan = ``;
let kategori = ``;

/**
 * defined class
 */
const modalDetail = new ModalDetail();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const kategoriList = $(`#${attributeName()[0]['kategoriList']}`);
const detailButton = $(`.${attributeName()[0]['detailButton']}`);
const searchDaftarBahan = $(`#${attributeName()[0]['searchDaftarBahan']}`);
const tipeBahanContainer = $(`#${attributeName()[0]['tipeBahanContainer']}`);
const kategoriContainer = $(`#${attributeName()[0]['kategoriContainer']}`);

/**
 * render data for table
 */
const renderTable = (tables) => {
  const tableElement = tables.map((table) => daftarBahanElement(table)).join('');
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
        ? urlDaftarBahan(currentPage, tipeBahan, kategori)
        : urlSearchDaftarBahan(currentPage, keyword, tipeBahan, kategori);
    const consumeApi = await getDaftarBahanAPI(url);
    const data = typeof consumeApi == 'undefined' ? [] : consumeApi;
    renderTable(data);
  } catch (error) {
    console.error(error);
  } finally {
    isLoading = false;
  }
};

/**
 * load kategori bahan
 */
const loadKategoriBahan = async () => {
  try {
    const keyword = null;
    const consumeApi = await getKategoriBahanAPI(currentPage, keyword);
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
const renderDaftarBahanTable = async () => {
  currentPage = 1;
  $(`${table.selector} tbody`).empty();
  window.addEventListener('scroll', handleScroll);
  loadData();
};

/**
 * detail daftar bahan handler
 */
const detailDaftarBahanHandler = () => {
  table.on('click', detailButton.selector, async function () {
    const uuid = $(this).data('uuid');
    const data = await getDaftarBahanByIdAPI(uuid);
    modalDetail.modalDetailHandler(data);
  });
};

/**
 * search data
 */
const searchDataHandler = () => {
  searchDaftarBahan.on('keyup', async function () {
    const keyword = $(this).val();
    $(`${table.selector} tbody`).empty();
    loadData(keyword);
  });
};

/**
 * filter data by type
 */
const filterDataByType = () => {
  let filterValue = [];
  tipeBahanContainer.on('click', `input[name="tipe_bahan[]"]`, async function () {
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
    tipeBahan = filterValue.length === 0 ? 'all' : filterValue;
    $(`${table.selector} tbody`).empty();
    loadData();
  });
};

/**
 * filter data by category
 */
const filterDataByCategory = () => {
  let filterValue = [];
  kategoriContainer.on('click', `input[name="kategori[]"]`, async function () {
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
 * initialize
 */
const init = async () => {
  renderDaftarBahanTable();
  detailDaftarBahanHandler();
  searchDataHandler();
  filterDataByType();
  filterDataByCategory();
  loadKategoriBahan();
};

export { init };
