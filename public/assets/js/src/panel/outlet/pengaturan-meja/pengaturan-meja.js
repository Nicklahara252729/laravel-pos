/**
 * import component attribute
 */
import { attributeName } from './components/attribute/attribute-name.js';

/**
 * import process
 */
import {
  init as readProcess,
  renderPengaturanMeja,
  searchDataHandler,
  renderWidgetTotal,
  voidItemHandler,
} from './process/read.js';
import { init as createProcess } from './process/create.js';
import { init as editProcess } from './process/edit.js';
import { init as deleteProcess } from './process/delete.js';

/**
 * defined component
 */
const tabButton = $(`#${attributeName()[0]['tabButton']}`);
const laporanTotalContainer = $(`#${attributeName()[0]['laporanTotalContainer']}`);

/**
 * Initialize read data
 */
const initializeReadData = async () => {
  const initialData = await readProcess('grup meja');
  outletInit(readProcess);
  datePickerInit(readProcess);
  return initialData;
};

/**
 * reading data process
 */
const readingDataProcess = async () => {
  let dataInitialized = false;
  let isAPICalling = false;
  let initialData = null;

  const ensureDataInitialized = async () => {
    if (!dataInitialized && !isAPICalling) {
      isAPICalling = true;
      initialData = await initializeReadData();
      dataInitialized = true;
      isAPICalling = false;
    }
  };

  await ensureDataInitialized();

  tabButton.on('click', 'li', async function () {
    const action = $(this).data('action');
    if (action === 'laporan') {
      renderWidgetTotal();
      voidItemHandler();
      laporanTotalContainer.toggle(true);
    } else {
      laporanTotalContainer.toggle(false);
    }
    await ensureDataInitialized();
    await renderPengaturanMeja(action);
    searchDataHandler(action);
  });
};

window.addEventListener('load', async () => {
  readingDataProcess();
  createProcess();
  editProcess();
  deleteProcess();
});
