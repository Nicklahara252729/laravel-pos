/**
 * import repositories
 */
import { getAkunById } from '../repositories/repositories.js';

/**
 * import component item
 */
import { akunElement } from '../components/item/akun.js';

/**
 * render account data handler
 */
const renderAkunElement = async () => {
  /**
   * load data outlet
   */
  const data = await getAkunById();
  akunElement(data);
};

/**
 * render outlet table
 */
const init = async () => {
  await renderAkunElement();
};

export { init };
