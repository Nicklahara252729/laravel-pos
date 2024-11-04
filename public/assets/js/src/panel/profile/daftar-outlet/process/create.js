/**
 * import repositories
 */
import { saveDaftarOutletAPI } from '../repositories/repositories.js';

/**
 * import component widget
 */
import { setDropify } from '../components/widget/dropify.js';

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
const daftarOutletModal = new ModalInput();

/**
 * defined componnet
 */
const addButton = $(`#${attributeName()[0]['addButton']}`);
const dropify = $(`.${attributeName()[0]['dropify']}`);

/**
 * Event listener for opening the create modal to add a new outlet.
 *
 * @event click
 * @listens #open-modal
 */
const addDaftarOutletHandler = () => {
  addButton.on('click', () => {
    setDropify(dropify.selector);
    daftarOutletModal.modalAddHandler(saveDaftarOutletAPI());
  });
};

/**
 * Initializes event listener for opening the create modal to add a new outlet.
 */
const init = () => {
  addDaftarOutletHandler();
};

export { init };
