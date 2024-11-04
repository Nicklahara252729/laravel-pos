/**
 * import repositories
 */
import {
  saveModifierAPI,
  saveModifierAssignItemAPI,
  saveModifierAssignIngredientAPI,
} from '../repositories/repositories.js';
import { getDaftarProdukAPI } from '../../daftar-produk/repositories/repositories.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';
import { ModalOption } from '../components/modal/option.js';
import { ModalRecipe } from '../components/modal/recipe.js';
import { ModalAssignItem } from '../components/modal/assign-item.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined class
 */
const modifierModal = new ModalInput();
const modifierOptionModal = new ModalOption();
const modifierRecipeModal = new ModalRecipe();
const assignItemModal = new ModalAssignItem();

/**
 * defined component
 */
const addButton = $(`#${attributeName()[0]['addButton']}`);
const addOptionButton = $(`#${attributeName()[0]['addOptionButton']}`);
const isRecipeContainer = $(`#${attributeName()[0]['isRecipeContainer']}`);
const addRecipeButton = $(`#${attributeName()[0]['addRecipeButton']}`);
const table = $(`#${attributeName()[0]['table']}`);
const assignItemButton = $(`.${attributeName()[0]['assignItemButton']}`);

/**
 * modal add modifier handler
 */
const addModifierHandler = () => {
  /**
   * open modal modifier
   */
  addButton.on('click', () => {
    const param = { urlModifier: saveModifierAPI(), urlRecipe: saveModifierAssignIngredientAPI() };
    modifierModal.modalAddHandler(param);
  });

  /**
   * open modal option
   */
  addOptionButton.on('click', () => {
    modifierOptionModal.modalAddHandler();
  });

  /**
   * open modal recipe
   */
  isRecipeContainer.on('click', addRecipeButton.selector, (event) => {
    modifierRecipeModal.modalAddHandler();
  });
};

/**
 * render item assign handler
 */
const itemAssignHandler = () => {
  table.on('click', assignItemButton.selector, async function () {
    const uuid = $(this).data('uuid');
    const urlProduk = urlDaftarProduk(1, 'all');
    const param = {
      url: saveModifierAssignItemAPI(uuid),
      dataProduk: await getDaftarProdukAPI(urlProduk),
    };
    assignItemModal.openModalHandler(param);
  });
};

/**
 * initialize
 */
const init = () => {
  addModifierHandler();
  itemAssignHandler();
};

export { init };
