/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formInput } from '../form/input.js';
import { formRecipe } from '../form/recipe.js';

/**
 * Represents a modal input handler for kategori produk.
 *
 * @class
 */
class ModalInput {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formInput;
    this.formManagerRecipe = formRecipe;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalInput']}`);
    this.titleModal = $(`#${attributeName()[0]['modalInput']} .modal-header h5`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitButton']}`);
    this.tableOption = $(`#${attributeName()[0]['tableOption']}`);
    this.limitContainer = $(`#${attributeName()[0]['isLimitContainer']}`);
    this.recipeContainer = $(`#${attributeName()[0]['isRecipeContainer']}`);
    this.isLimitSwitch = $(`#${attributeName()[0]['isLimitSwitch']}`);
    this.isRecipeSwitch = $(`#${attributeName()[0]['isRecipeSwitch']}`);
  }

  /**
   * limit handler
   */
  limitModifierHandler = () => {
    this.isLimitSwitch.change((event) => {
      this.limitContainer.toggle(event.target.checked);
    });
  };

  /**
   * recipe handler
   */
  recipeModifierHandler = () => {
    this.isRecipeSwitch.change((event) => {
      this.recipeContainer.toggle(event.target.checked);
    });
  };

  /**
   * Handles modal behavior for adding a new modifier produk.
   */
  modalAddHandler(param) {
    this.tableOption.toggle(false);
    this.limitContainer.toggle(false);
    this.recipeContainer.toggle(false);
    this.formManager.setMethod('POST');
    this.formManagerRecipe.setMethod('POST');
    this.formManager.setAction(param.urlModifier);
    this.formManagerRecipe.setAction(param.urlRecipe);
    this.formManager.emptyForm();
    this.titleModal.text('Tambah Modifier');
    this.buttonSubmit.text('Simpan');
    this.limitModifierHandler();
    this.recipeModifierHandler();
  }

  /**
   * Handles modal behavior for editing an existing modifier produk.
   *
   * @param {string} param - The unique identifier of the modifier produk to be edited.
   */
  async modalEditHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    this.formManager.fillForm(param.dataModifier);
    this.titleModal.text('Edit Modifier');
    this.buttonSubmit.text('Simpan perubahan');
    this.modal.modal('show');
  }
}

export { ModalInput };
