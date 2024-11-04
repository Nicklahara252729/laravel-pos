/**
 * import repositories
 */
import { saveHakAksesAPI } from '../repositories/repositories.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined class
 */
const hakAksesModal = new ModalInput();

/**
 * defined component
 */
const addButton = $(`#${attributeName()[0]['addButton']}`);

/**
 * Event listener for opening the create modal to add a new outlet.
 *
 * @event click
 * @listens #open-modal
 */
const addHakAksesHandler = () => {
  addButton.on('click', () => {
    hakAksesModal.modalAddHandler(saveHakAksesAPI());
  });
};

/**
 * Initializes event listener for opening the create modal to add a new outlet.
 */
const init = () => {
  addHakAksesHandler();
};

export { init };
