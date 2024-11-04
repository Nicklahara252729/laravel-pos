/**
 * import component
 */
import { init as readProcess } from './process/read.js';
import { Edit } from './process/edit.js';

/**
 * Initialize read data
 */
const initializeReadData = async () => {
  const initialData = await readProcess();
  outletInit(readProcess);
  return initialData;
};

/**
 * reading data process
 */
const readingDataProcess = async () => {
  let dataInitialized = false;
  let isAPICalling = false; // Flag untuk melacak apakah ada pemanggilan API yang sedang berlangsung
  let initialData = null;

  // Function untuk memastikan data diinisialisasi hanya sekali
  const ensureDataInitialized = async () => {
    if (!dataInitialized && !isAPICalling) {
      isAPICalling = true; // Set status pemanggilan API menjadi sedang berlangsung
      initialData = await initializeReadData();
      dataInitialized = true;
      isAPICalling = false; // Set status pemanggilan API menjadi selesai
    }
  };

  // Inisialisasi data pertama kali
  await ensureDataInitialized();
};

/**
 * call function
 */
const editPrcess = new Edit();
editPrcess.editHandler();
window.addEventListener('load', async () => {
  readingDataProcess();
});