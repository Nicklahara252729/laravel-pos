/**
 * import repositories
 */
import {
  getRiwayatTransaksiAPI,
  getTotalRiwayatTransaksiAPI,
  getRiwayatTransaksByIdAPI,
} from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { transactionTableElement, widgetTotalElement } from '../components/table/transaction.js';

/**
 * import component modal
 */
import { ModalReceipt } from '../components/modal/receipt.js';

/**
 * defined default value
 */
let currentPage = 1; // Current page number
let isLoading = false; // Flag to prevent multiple simultaneous requests
let dateRange = false;
let checkDateRange = 'undefined';
let currentOutlet = getDefaultOutletUuid();
let newOutlet = null;
let uuidTransaksi = null;

/**
 * defiend class
 */
const modalReceipt = new ModalReceipt();

/**
 * defined component
 */
const transactionList = $(`#${attributeName()[0]['transactionList']}`);
const searchRiwayatTransaksi = $(`#${attributeName()[0]['searchRiwayatTransaksi']}`);

/**
 * render data for table
 */
const renderTable = (tables) => {
  const tableElement = tables.map((table) => transactionTableElement(table)).join('');
  transactionList.append(tableElement);
};

/**
 * load data
 */
const loadData = async (keyword = null) => {
  if (isLoading) return;

  try {
    isLoading = true;
    if (dateRange === false || (currentPage === 1 && currentOutlet !== newOutlet)) {
      checkDateRange = getDateRange();
    }
    dateRange = typeof checkDateRange == 'undefined' ? false : true;
    const url =
      keyword === null
        ? urlDataRiwayatTransaksi(currentPage, dateRange)
        : urlSearchRiwayatTransaksi(currentPage, keyword, dateRange);
    const consumeApi = await getRiwayatTransaksiAPI(url);
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
 * render widget total
 */
const renderWidgetTotal = async () => {
  const checkDateRange = getDateRange();
  const dateRange = typeof checkDateRange == 'undefined' ? false : true;
  const url = urlTotalRiwayatTransaksi(dateRange);
  const totalData = await getTotalRiwayatTransaksiAPI(url);
  widgetTotalElement(totalData);
};

/**
 * search data
 */
const searchDataHandler = () => {
  searchRiwayatTransaksi.on('keyup', async function () {
    const keyword = $(this).val();
    transactionList.empty();
    loadData(keyword);
  });
};

/**
 * render table
 */
const renderRiwayatTransaksiTable = async () => {
  currentPage = 1;
  newOutlet = getDefaultOutlet().uuid_outlet;
  transactionList.empty();
  window.addEventListener('scroll', handleScroll);
  loadData();
};

/**
 * receipt handler
 */
const receiptHandler = () => {
  transactionList.on('click', 'tbody tr', async function () {
    uuidTransaksi = localStorage.setItem('uuidTransaksi', JSON.stringify($(this).data('id')));
    const data = await getRiwayatTransaksByIdAPI(uuidTransaksi);
    modalReceipt.openReceiptModal(data);
  });
};

/**
 * initialize
 */
const init = async () => {
  receiptHandler();
  renderWidgetTotal();
  renderRiwayatTransaksiTable();
  searchDataHandler();
};

export { init };
