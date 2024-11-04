/**
 * import repositories
 */
import {
  updateSistemAPI,
  updateInfoBisnisAPI,
  updateNpwpAPI,
} from '../repositories/repositories.js';
import { getPengaturanAPI } from '../repositories/repositories.js';

/**
 * import component widget
 */
import { setDropify } from '../components/widget/dropify.js';

/**
 * import component modal
 */
import { ModalSistem } from '../components/modal/sistem.js';
import { ModalInfoBisnis } from '../components/modal/info-bisnis.js';
import { ModalNpwp } from '../components/modal/npwp.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined class
 */
const sistemModal = new ModalSistem();
const infoBisnisModal = new ModalInfoBisnis();
const npwpModal = new ModalNpwp();

/**
 * defined component
 */
const sistemButton = $(`#${attributeName()[0]['sistemButton']}`);
const infoBisnisButton = $(`#${attributeName()[0]['infoBisnisButton']}`);
const npwpButton = $(`#${attributeName()[0]['npwpButton']}`);

/**
 * Event listener for opening the create modal to edit sistem.
 *
 * @event click
 * @listens #open-modal
 */
const editSistemHandler = () => {
  sistemButton.on('click', async function () {
    setDropify();
    const param = { url: updateSistemAPI(), data: await modalEditHandler() };
    sistemModal.modalEditHandler(param);
  });
};

/**
 * Event listener for opening the create modal to edit info bisnis.
 *
 * @event click
 * @listens #open-modal
 */
const editInfoBisnisHandler = () => {
  infoBisnisButton.on('click',async function () {
    setDropify();
    const param = { url: updateInfoBisnisAPI(), data: await modalEditHandler() };
    infoBisnisModal.modalInfoBisnisHandler(param);
  });
};

/**
 * Event listener for opening the create modal to edit npwp.
 *
 * @event click
 * @listens #open-modal
 */
const editNpwpHandler = () => {
  npwpButton.on('click', async function () {
    setDropify();
    const param = { url: updateNpwpAPI(), data: await modalEditHandler() };
    npwpModal.modalNpwpHandler(param);
  });
};

/**
 * Initializes event listener
 */
const init = () => {
  editSistemHandler();
  editInfoBisnisHandler();
  editNpwpHandler();
};

export { init };
