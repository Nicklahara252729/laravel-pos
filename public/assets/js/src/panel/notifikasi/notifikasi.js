/**
 * import process
 */
import { init as readProcess } from './process/read.js';

/**
 * Initialize read data
 */
const initializeReadData = async () => {
  const initialData = await readProcess();
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
};

window.addEventListener('load', async () => {
  readingDataProcess();
});
