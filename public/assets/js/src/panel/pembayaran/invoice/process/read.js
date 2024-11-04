/**
 * import repositories
 */
import { getInvoiceAPI, getInvoiceByIdAPI } from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { invoiceTable } from '../components/table/invoice.js';

/**
 * import component modal
 */
import { ModalDetail } from '../components/modal/detail.js';

/**
 * defined default value
 */
let currentPage = 1; // Current page number
let isLoading = false; // Flag to prevent multiple simultaneous requests
let status = 'all';

/**
 * defind class
 */
const modalDetail = new ModalDetail();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const searchTable = $(`#${attributeName()[0]['searchTable']}`);
const filterContainer = $(`#${attributeName()[0]['filterContainer']}`);
const detailButton = $(`#${attributeName()[0]['detailButton']}`);
const detailButtonContainer = $(`.${attributeName()[0]['detailButtonContainer']}`);
const submitPaymentInvoiceButton = $(`#${attributeName()[0]['submitPaymentInvoiceButton']}`);

/**
 * render data for table
 */
const renderTable = (tables) => {
  const tableElement = tables.map((table) => invoiceTable(table)).join('');
  table.append(tableElement);
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
        ? urlDataInvoice(currentPage, status)
        : urlSearchDataInvoice(currentPage, keyword, status);
    const consumeApi = await getInvoiceAPI(url);
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
const renderRiwayatTransaksiTable = async () => {
  currentPage = 1;
  table.empty();
  window.addEventListener('scroll', handleScroll);
  loadData();
};

/**
 * search data
 */
const searchDataHandler = () => {
  searchTable.on('keyup', async function () {
    const keyword = $(this).val();
    table.empty();
    loadData(keyword);
  });
};

/**
 * filter data by status
 */
const filterData = () => {
  let filterValue = [];
  filterContainer.on('click', `input[name="status[]"]`, async function () {
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
    status = filterValue.length === 0 ? 'all' : filterValue;
    table.empty();
    loadData();
  });
};

/**
 * detail invoice handler
 */
const detailInvoiceHandler = () => {
  table.on('click', detailButton.selector, async function () {
    detailButtonContainer.toggle(true);
    submitPaymentInvoiceButton.addClass('d-none');
    const uuid = $(this).data('uuid');
    const number = $(this).data('number');
    const param = { data: await getInvoiceByIdAPI(uuid) };
    modalDetail.modalDetailHandler(param);
    localStorage.setItem('alvaInvoiceID', uuid);
    localStorage.setItem('alvaInvoiceNumber', number);
  });
};

/**
 * initialize
 */
const init = async () => {
  renderRiwayatTransaksiTable();
  searchDataHandler();
  filterData();
  detailInvoiceHandler();
};

export { init };
