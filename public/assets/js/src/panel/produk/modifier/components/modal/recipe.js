/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component table
 */
import { createObjectRecipeTable, renderRecipeTable } from '../table/recipe.js';

/**
 * Represents a modal input handler for kategori produk.
 *
 * @class
 */
class ModalRecipe {
  /**
   * Creates a new instance of ModalRecipe.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modalRecipe = $(`#${attributeName()[0]['modalRecipe']}`);
    this.tableRecipe = $(`#${attributeName()[0]['tableRecipe']}`);
    this.submitRecipeButton = $(`#${attributeName()[0]['submitRecipeButton']}`);
    this.modalInput = $(`#${attributeName()[0]['modalInput']}`);
  }

  /**
   * recipe insert into main modal
   */
  recipeTableList = () => {
    this.modalRecipe.on('click', this.submitRecipeButton.selector, () => {
      this.tableRecipe.toggle(true);
      const recipeObj = createObjectRecipeTable();
      renderRecipeTable(recipeObj);
      this.modalRecipe.modal('hide');
    });
  };

  /**
   * Handles modal behavior for adding a new modifier produk.
   */
  modalAddHandler() {
    /**
     * modal opened
     */
    this.modalRecipe.modal('show');
    $(`${this.modalInput.selector} .modal-content`).addClass('dim');
    this.modalRecipe.on('hide.bs.modal', () => {
      $(`${this.modalInput.selector} .modal-content`).removeClass('dim');
    });

    /**
     * callback method
     */
    this.recipeTableList();
  }
}

export { ModalRecipe };
