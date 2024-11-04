/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { kategoriTableElement } from '../components/table/kategori.js';

/**
 * import repositories
 */
import { getKategoriBahanAPI } from '../repositories/repositories.js';

/**
 * defined defautl value
 */
let currentPage = 1;
let isLoading = false;

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);

/**
 * render data for table
 */
const renderTable = (tables) => {
  const tableElement = tables.map((table) => kategoriTableElement(table)).join('');
  table.append(tableElement);
};

/**
 * load data
 */
const loadData = async () => {
  if (isLoading) return;

  try {
    isLoading = true;
    const consumeApi = await getKategoriBahanAPI(currentPage);
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
 * initialize
 */
const init = async () => {
  renderKategoriTable();
};

export { init };
