/**
 * import repositories
 */
import {
  getGrupMejaAPI,
  getGrupMejaByIdAPI,
  getTotalLaporanAPI,
  getLaporanAPI,
  getLaporanTransaksiAPI,
  getLaporanVoidAPI,
} from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { grupMejaTableElement, laporanTableElement } from '../components/table/pengaturan-meja.js';

/**
 * import component widget
 */
import { widgetTotalElement } from '../components/widget/pengaturan-meja.js';

/**
 * import component modal
 */
import { ModalTransaction } from '../components/modal/transaction.js';
import { ModalVoidItem } from '../components/modal/void-item.js';

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
let kategori = ``;

/**
 * defined class
 */
const transaksiModal = new ModalTransaction();
const voidModal = new ModalVoidItem();

/**
 * defined component
 */
const tableGrupMeja = $(`#${attributeName()[0]['tableGrupMeja']} tbody`);
const tableLaporan = $(`#${attributeName()[0]['tableLaporan']} tbody`);
const searchGrupMeja = $(`#${attributeName()[0]['searchGrupMeja']}`);
const searchLaporan = $(`#${attributeName()[0]['searchLaporan']}`);
const voidButton = $(`#${attributeName()[0]['voidButton']}`);
const kategoriContainer = $(`#${attributeName()[0]['kategoriContainer']}`);

/**
 * render data for table
 */
const renderTable = (tables, type) => {
  let table = ``;
  let rowElement = ``;
  if (type === 'grup meja') {
    table = tableGrupMeja;
    rowElement = tables.map((table) => grupMejaTableElement(table));
  } else {
    table = tableLaporan;
    rowElement = tables.map((table) => laporanTableElement(table));
  }
  const tableElement = rowElement.join('');
  table.append(tableElement);
};

/**
 * load data
 */
const loadData = async (type, keyword = null) => {
  if (isLoading) return;

  try {
    isLoading = true;

    if (type === 'laporan') {
      if (dateRange === false || (currentPage === 1 && currentOutlet !== newOutlet)) {
        checkDateRange = getDateRange();
      }
      dateRange = typeof checkDateRange == 'undefined' ? false : true;
    }

    const url =
      type === 'grup meja'
        ? urlPengaturanMejaGrupMeja(currentPage, keyword)
        : urlPengaturanMejaLaporan(currentPage, keyword, kategori, dateRange);
    const consumeApi = type === 'grup meja' ? await getGrupMejaAPI(url) : await getLaporanAPI(url);
    const data = typeof consumeApi == 'undefined' ? [] : consumeApi;
    renderTable(data, type);
  } catch (error) {
    console.error(error);
  } finally {
    isLoading = false;
  }
};

/**
 * handle data where scrolling
 */
const handleScroll = (type) => {
  const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
  if (scrollTop + clientHeight >= scrollHeight - 5 && !isLoading) {
    currentPage++;
    loadData(type);
  }
};

/**
 * render table
 */
const renderPengaturanMeja = async (type) => {
  currentPage = 1;
  newOutlet = getDefaultOutlet().uuid_outlet;
  let table = ``;
  if (type === 'grup meja') {
    table = tableGrupMeja;
  } else {
    table = tableLaporan;
  }
  table.empty();
  window.addEventListener('scroll', () => {
    handleScroll(type);
  });
  loadData(type);
};

/**
 * search data
 */
const searchDataHandler = (type) => {
  const searchBar = type === 'grup meja' ? searchGrupMeja : searchLaporan;
  searchBar.on('keyup', async function () {
    const keyword = $(this).val();
    let table = ``;
    if (type === 'grup meja') {
      table = tableGrupMeja;
    } else {
      table = tableLaporan;
    }
    table.empty();
    loadData(type, keyword);
  });
};

/**
 * render widget total
 */
const renderWidgetTotal = async () => {
  const checkDateRange = getDateRange();
  const dateRange = typeof checkDateRange == 'undefined' ? false : true;
  const url = urlTotalPengaturanMejaLaporan(dateRange);
  const totalData = await getTotalLaporanAPI(url);
  widgetTotalElement(totalData);
};

/**
 * transaction handler
 */
const transactionHandler = () => {
  tableLaporan.on('click', 'tr', async function () {
    uuidTransaksi = $(this).data('id');
    const data = await getLaporanTransaksiAPI(uuidTransaksi);
    transaksiModal.modalOpenHandler(data);
  });
};

/**
 * void item handler
 */
const voidItemHandler = () => {
  voidButton.on('click', async function () {
    const data = await getLaporanVoidAPI();
    voidModal.modalOpenHandler(data);
  });
};

/**
 * filter data
 */
const filterByKategoriAll = () => {
  kategoriContainer.on('click', 'div a', async function () {
    const action = $(this).data('action');
    const text = $(this).text();
    kategori = action;
    tableLaporan.empty();
    $(`${kategoriContainer.selector} button span`).text(text);
    loadData('laporan');
  });
};

/**
 * initialize
 */
const init = async (type) => {
  renderPengaturanMeja(type);
  searchDataHandler(type);
  renderWidgetTotal();
  transactionHandler();
  filterByKategoriAll();
};

export {
  init,
  renderPengaturanMeja,
  searchDataHandler,
  renderWidgetTotal,
  transactionHandler,
  voidItemHandler,
  filterByKategoriAll,
};
