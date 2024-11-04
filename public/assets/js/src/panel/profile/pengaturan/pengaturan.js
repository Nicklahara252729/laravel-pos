/**
 * import process
 */
import { init as readProcess } from './process/read.js';
import { init as editProcess } from './process/edit.js';

/**
 * call function
 */
window.addEventListener('load', async () => {
  readProcess();
  editProcess();
});
