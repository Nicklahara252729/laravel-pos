/**
 * import helper
 */
import { capitalizeFirstLetter } from '../../../../../helpers/converter.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { metodePembayaranTableElement } from '../components/table/ringkasan-inventory.js';

/**
 * import repositories
 */
import { getRingkasanInventoryAPI } from '../repositories/repositories.js';

/**
 * defined default value
 */
let currentPage = 1;
let isLoading = false;
let kategori = ``;

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const searchRingkasanInventory = $(`#${attributeName()[0]['searchRingkasanInventory']}`);
const filterKategori = $(`#${attributeName()[0]['filterKategori']}`);

/**
 * render data for table
 */
const renderTable = (tables) => {
  const tableElement = tables.map((table) => metodePembayaranTableElement(table)).join('');
  table.append(tableElement);
};

/**
 * load data
 */
const loadData = async (kategori = null, keyword = null) => {
  if (isLoading) return;

  try {
    isLoading = true;
    const url = urlRingksanInventory(kategori, currentPage, keyword);
    const consumeApi = await getRingkasanInventoryAPI(url);
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
 * search data
 */
const searchDataHandler = () => {
  searchRingkasanInventory.on('keyup', async function () {
    const keyword = $(this).val();
    table.empty();
    loadData(keyword);
  });
};

/**
 * filter by kategori
 */
const filterByKategori = () => {
  filterKategori.on('click', 'div a', async function () {
    const action = $(this).data('action');
    const text = action === '' ? 'Semua' : action;
    kategori = action;
    table.empty();
    $(`${filterKategori} button span`).text(capitalizeFirstLetter(text));
    loadData(action);
  });
};

/**
 * initialize
 */
const init = async () => {
  renderKategoriTable();
  searchDataHandler();
  filterByKategori();
};

export { init };
