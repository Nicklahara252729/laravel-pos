/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { pelangganTableElement } from '../components/table/pelanggan.js';

/**
 * import component modal
 */
import { ModalDetail } from '../components/modal/detail.js';
import { ModalReceipt } from '../components/modal/receipt.js';
import { ModalTransaction } from '../components/modal/transaction.js';

/**
 * import repositories
 */
import {
  getPelangganAPI,
  getPelangganByIdAPI,
  receiptPelangganAPI,
  transaksiPelangganAPI,
  searchPelangganAPI,
} from '../repositories/repositories.js';

/**
 * defined default value
 */
let currentPage = 1;
let isLoading = false;
let uuidPelangganVal = null;

/**
 * defined class
 */
const modalTransaction = new ModalTransaction();
const modalReceipt = new ModalReceipt();
const modalDetail = new ModalDetail();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const transactionList = $(`#${attributeName()[0]['transactionList']}`);
const daftarTransaksiButton = $(`#${attributeName()[0]['daftarTransaksiButton']}`);
const cariPelanggan = $(`#${attributeName()[0]['cariPelanggan']}`);

/**
 * detail handler
 */
const detailPelangganHandler = () => {
  table.on('click', 'tr', async function () {
    const uuidPelanggan = $(this).data('uuid');
    uuidPelangganVal = uuidPelanggan;
    const data = await getPelangganByIdAPI(uuidPelanggan);
    modalDetail.detailModal(data, uuidPelanggan);
  });
};

/**
 * receipt handler
 */
const receiptHandler = () => {
  transactionList.on('click', 'li', async function () {
    const uuidTransaksi = $(this).data('uuid');
    const data = await receiptPelangganAPI(uuidTransaksi);
    modalReceipt.modalOpenHandler(data);
  });
};

/**
 * transaction handler
 */
const transactionHandler = () => {
  daftarTransaksiButton.on('click', async function () {
    const data = await transaksiPelangganAPI(uuidPelangganVal);
    modalTransaction.modalOpenHandler(data);
  });
};

/**
 * render data for table
 */
const renderTable = (tables) => {
  const tableElement = tables.map((table) => pelangganTableElement(table)).join('');
  table.append(tableElement);
};

/**
 * load data
 */
const loadData = async () => {
  if (isLoading) return;

  try {
    isLoading = true;
    const consumeApi = await getPelangganAPI(currentPage);
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
const renderPelangganTable = async () => {
  currentPage = 1;
  table.empty();
  window.addEventListener('scroll', handleScroll);
  loadData();
};

/**
 * render search table
 */
const renderSearchTable = async () => {
  cariPelanggan.on('keyup', async function () {
    table.empty();
    const keyword = this.value;
    if (isLoading) return;

    try {
      isLoading = true;
      const consumeApi = await searchPelangganAPI(keyword);
      const data = typeof consumeApi == 'undefined' ? [] : consumeApi;
      renderTable(data);
    } catch (error) {
      console.error(error);
    } finally {
      isLoading = false;
    }
  });
};

/**
 * initialize
 */
const init = async () => {
  renderPelangganTable();
  detailPelangganHandler();
  receiptHandler();
  transactionHandler();
  renderSearchTable();
};

export { init };
