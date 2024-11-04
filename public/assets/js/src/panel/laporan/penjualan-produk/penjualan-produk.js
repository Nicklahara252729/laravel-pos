/**
 * import component attribute
 */
import { attributeName } from './components/attribute/attribute-name.js';

/**
 * import process
 */
import { init as readProcess, renderPenjualanProduk } from './process/read.js';
import { init as createProcess } from './process/create.js';

/**
 * defined component
 */
const tabIncome = `${attributeName()[0]['tabIncome']}`;
const tabQuantity = `${attributeName()[0]['tabQuantity']}`;

/**
 * Initialize read data
 */
const initializeReadData = async () => {
  const initialData = await readProcess('income');
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

  document.getElementById(tabIncome).addEventListener('click', async () => {
    await ensureDataInitialized();
    await renderPenjualanProduk('income');
  });

  document.getElementById(tabQuantity).addEventListener('click', async () => {
    await ensureDataInitialized();
    await renderPenjualanProduk('quantity');
  });
};

window.addEventListener('load', async () => {
  readingDataProcess();
  createProcess();
});
