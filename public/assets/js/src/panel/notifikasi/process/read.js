/**
 * import repositories
 */
import { getNotificationAPI } from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component table
 */
import { notificationElement } from '../components/table/notifikasi.js';

/**
 * defined default value
 */
let currentPage = 1; // Current page number
let isLoading = false; // Flag to prevent multiple simultaneous requests
let dateRange = false;
let checkDateRange = 'undefined';
let currentOutlet = getDefaultOutletUuid();
let newOutlet = null;

/**
 * defined component
 */
const notificationList = $(`#${attributeName()[0]['notificationList']}`);

/**
 * render data for table
 */
const renderTable = (datas) => {
  const tableElement = datas.map((table) => notificationElement(table)).join('');
  notificationList.append(tableElement);
};

/**
 * load data
 */
const loadData = async () => {
  if (isLoading) return;

  try {
    isLoading = true;
    if (dateRange === false || (currentPage === 1 && currentOutlet !== newOutlet)) {
      checkDateRange = getDateRange();
    }
    dateRange = typeof checkDateRange == 'undefined' ? false : true;
    const url = urlNotifikasi(currentPage, dateRange);
    const consumeApi = await getNotificationAPI(url);
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
const renderNotifikasiTable = async () => {
  currentPage = 1;
  newOutlet = getDefaultOutlet().uuid_outlet;
  notificationList.empty();
  window.addEventListener('scroll', handleScroll);
  loadData();
};

/**
 * initialize
 */
const init = async () => {
  renderNotifikasiTable();
};

export { init };
