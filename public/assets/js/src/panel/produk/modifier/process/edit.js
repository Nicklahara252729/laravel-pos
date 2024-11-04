/**
 * import repositories
 */
import {
  updateModifierAPI,
  updateModifierAssignIngredientAPI,
  getModifierByIdAPI,
} from '../repositories/repositories.js';

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
const kategoriModal = new ModalInput();

/**
 * defind component
 */
const table = $(`#${attributeName()[0]['table']}`);
const editButton = $(`.${attributeName()[0]['editButton']}`);

/**
 * edit data handler
 */
const editKategoriProdukHandler = () => {
  table.on('click', editButton.selector, async function () {
    const uuidModifier = $(this).data('uuid');
    const param = {
      urlModifier: updateModifierAPI(uuidModifier),
      urlRecipe: updateModifierAssignIngredientAPI(uuidModifier),
      dataModifier: await getModifierByIdAPI(uuidModifier),
    };
    kategoriModal.modalEditHandler(param);
  });
};

/**
 * initalize
 */
const init = async () => {
  editKategoriProdukHandler();
};

export { init };
