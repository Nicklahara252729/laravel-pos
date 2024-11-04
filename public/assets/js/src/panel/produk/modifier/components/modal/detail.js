/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import item
 */
import { detailElement, detailOptionElement, detailRecipeElement } from '../item/detail.js';

/**
 * Represents a modal input handler.
 *
 * @class
 */
class ModalDetail {
  /**
   * Creates a new instance.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
    this.detailOption = $(`#${attributeName()[0]['detailOption']}`);
    this.detailRecipe = $(`#${attributeName()[0]['detailRecipe']}`);
  }

  /**
   * open detail modal
   */
  modalDetailProdukModifier(data) {
    this.modalDetail.modal('show');

    detailElement(data);

    $(`${this.detailOption.selector} table`).toggle(true);
    const dataOption = data.option;
    const optionList = dataOption.map((dataOption) => detailOptionElement(dataOption)).join('');
    $(`${this.detailOption.selector} table tbody`).empty();
    $(`${this.detailOption.selector} table tbody`).append(optionList);

    $(`${this.detailRecipe.selector} table`).toggle(true);
    $(`${this.detailRecipe.selector} table tbody`).empty();
    $(`${this.detailRecipe.selector} table tbody`).append();
  }
}

export { ModalDetail };
