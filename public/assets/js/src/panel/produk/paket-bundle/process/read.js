/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { paketBundleTableElement } from '../components/table/paket-bundle.js';

/**
 * import component modal
 */
import { ModalDetail } from '../components/modal/detail.js';

/**
 * import repositories
 */
import { getPaketBundleAPI, getPaketBundleByIdAPI } from '../repositories/repositories.js';

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
const loadData = async () => {
  if (isLoading) return;

  try {
    isLoading = true;
    const consumeApi = await getPaketBundleAPI(currentPage);
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
const renderPaketBundleTable = async () => {
  currentPage = 1;
  table.empty();
  window.addEventListener('scroll', handleScroll);
  loadData();
};

/**
 * render detail paket bundle handler
 */
const detailPaketBundleHandler = () => {
  table.on('click', detailButton.selector, async function () {
    const uuid = $(this).data('uuid');
    const param = { data: await getPaketBundleByIdAPI(uuid) };
    modalDetail.modalDetailPaketBundle(param);
  });
};

/**
 * initialize
 */
const init = async () => {
  renderPaketBundleTable();
  detailPaketBundleHandler();
};

export { init };
