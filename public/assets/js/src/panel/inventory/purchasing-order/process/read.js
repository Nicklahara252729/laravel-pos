/**
 * import repositories
 */
import { getPOAPI, getPOByIdAPI } from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { transactionTableElement } from '../components/table/transaction.js';

/**
 * import component item
 */
import { noDataElement } from '../components/item/transaction.js';

/**
 * import component modal
 */
import { ModalDetail } from '../components/modal/detail.js';

/**
 * defined default value
 */
let currentPage = 1; // Current page number
let isLoading = false; // Flag to prevent multiple simultaneous requests
let dateRange = false;
let checkDateRange = 'undefined';
let currentOutlet = getDefaultOutletUuid();
let newOutlet = null;
let uuidPO = null;
let kategori = ``;

/**
 * defined class
 */
const detailModal = new ModalDetail();

/**
 * defined component
 */
const transactionList = $(`#${attributeName()[0]['transactionList']}`);
const badgePersetujuan = $(`.${attributeName()[0]['badgePersetujuan']}`);
const searchPurchasingOrder = $(`#${attributeName()[0]['searchPurchasingOrder']}`);

/**
 * render data for table
 */
const renderTable = (tables) => {
  const tableElement =
    tables.length === 0
      ? noDataElement()
      : tables.map((table) => transactionTableElement(table)).join('');

  tables.length === 0 ? transactionList.empty() : ``;
  transactionList.append(tableElement);

  /**
   * count data with cateogry code 1
   */
  let statusCount = 0;
  tables.forEach((day) => {
    day.rows.forEach((row) => {
      if (row.status.kode === 1) {
        statusCount++;
      }
    });
  });
  badgePersetujuan.text(statusCount);
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
        ? urlPO(currentPage, kategori, dateRange)
        : urlSearchPO(currentPage, keyword, kategori, dateRange);
    const consumeApi = await getPOAPI(url);
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
 * search data
 */
const searchDataHandler = (type) => {
  searchPurchasingOrder.on('keyup', async function () {
    const keyword = $(this).val();
    transactionList.empty();
    loadData(keyword);
  });
};

/**
 * render table
 */
const renderPOHandler = async (type) => {
  currentPage = 1;
  kategori = type;
  newOutlet = getDefaultOutlet().uuid_outlet;
  transactionList.empty();
  window.addEventListener('scroll', handleScroll);
  loadData();
};

/**
 * detail purchasing order handler
 */
const detailPOHandler = (type) => {
  transactionList.on('click', 'tbody tr', async function () {
    uuidPO = $(this).data('id');
    localStorage.setItem('uuidPO', uuidPO);
    const data = await getPOByIdAPI(uuidPO);
    detailModal.modalDetailHandler(data);
  });
};

/**
 * initialize
 */
const init = async (type) => {
  renderPOHandler(type);
  searchDataHandler(type);
  detailPOHandler(type);
};

export { init, renderPOHandler, searchDataHandler, detailPOHandler };
