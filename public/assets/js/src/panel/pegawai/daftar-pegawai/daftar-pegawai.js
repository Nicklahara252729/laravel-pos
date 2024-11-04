/**
 * import component attribute
 */
import { attributeName } from './components/attribute/attribute-name.js';

/**
 * import process
 */
import { init as readProcess, rendetDaftarPegawaiTable } from './process/read.js';
import { init as createProcess } from './process/create.js';
import { init as editProcess } from './process/edit.js';
import { init as deleteProcess } from './process/delete.js';

/**
 * defined component
 */
const activeDataButton = `${attributeName()[0]['activeDataButton']}`;
const inactiveDataButton = `${attributeName()[0]['inactiveDataButton']}`;
const filterData = $(`#${attributeName()[0]['filterData']}`);

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

  // Contoh: Mengganti data outlet dan mereset tabel
  document.getElementById(activeDataButton).addEventListener('click', async () => {
    await ensureDataInitialized();
    await rendetDaftarPegawaiTable('active');
    filterData.text('Filter status : Aktif');
  });

  document.getElementById(inactiveDataButton).addEventListener('click', async () => {
    await ensureDataInitialized();
    await rendetDaftarPegawaiTable('inactive');
    filterData.text('Filter status : Tidak Aktif');
  });
};

/**
 * call function
 */
window.addEventListener('load', async () => {
  readingDataProcess();
  createProcess();
  editProcess();
  deleteProcess();
});
