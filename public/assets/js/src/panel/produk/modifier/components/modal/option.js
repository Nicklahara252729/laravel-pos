/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component table
 */
import { renderTable } from '../table/option.js';

/**
 * import component item
 */
import { createOptionInput } from '../item/option.js';
import { init as itemRecipe } from '../item/recipe.js';

/**
 * Represents a modal input handler for kategori produk.
 *
 * @class
 */
class ModalOption {
  /**
   * Creates a new instance of ModalOption.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modalOption = $(`#${attributeName()[0]['modalOption']}`);
    this.optionInputList = $(`#${attributeName()[0]['optionInputList']}`);
    this.tableOption = $(`#${attributeName()[0]['tableOption']}`);
    this.addOtherOptionButton = $(`#${attributeName()[0]['addOtherOptionButton']}`);
    this.deleteOptionButton = $(`.${attributeName()[0]['deleteOptionButton']}`);
    this.submitOptionButton = $(`#${attributeName()[0]['submitOptionButton']}`);
    this.modalInput = $(`#${attributeName()[0]['modalInput']}`);
  }

  /**
   * render section input
   */
  renderSectionsInput = (optionsObj) => {
    // Create sections based on options object
    const sections = optionsObj.map((option, index) =>
      createOptionInput(option.name, option.price, index)
    );

    // Append sections to the option input list
    this.optionInputList.append(sections);
  };

  /**
   * create option object
   */
  createOptionsObject = () => {
    const optionsObj = [];

    // Iterate through the sections
    $(`${this.optionInputList.selector} section`).each(function () {
      const section = $(this);

      // Get input values within the section
      const optionName = section.find('input[name="option_name[]"]').val();
      const optionPrice = section.find('input[name="option_price[]"]').val();

      // Create an object for the option
      const option = {
        name: optionName,
        price: optionPrice,
      };

      // Push the option object to the optionsObj array
      optionsObj.push(option);
    });

    return optionsObj;
  };

  /**
   * add new option section
   */
  addOptionSection() {
    this.addOtherOptionButton.on('click', (event) => {
      event.preventDefault();
      const optionsObj = this.createOptionsObject();
      this.optionInputList.append(this.renderSectionsInput(optionsObj));
    });
  }

  /**
   * remove option section
   */
  removeOptionSection() {
    this.modalOption.on('click', this.deleteOptionButton.selector, function () {
      var section = $(this).closest('section');
      section.remove();
    });
  }

  /**
   * option insert into main modal
   */
  optionTableList = () => {
    this.modalOption.on('click', this.submitOptionButton.selector, () => {
      this.tableOption.toggle(true);

      // Create an object based on the sections' input values
      const optionsObj = this.createOptionsObject();
      renderTable(optionsObj);

      const recipeTableData = optionsObj.map((option) => {
        return {
          name: option.name,
          recipe: '', // Placeholder for recipe data
          quantity: '', // Placeholder for quantity data
          unit: '', // Placeholder for unit data
        };
      });
      this.modalOption.modal('hide');
      itemRecipe(recipeTableData);
    });
  };

  /**
   * Handles modal behavior for adding a new modifier produk.
   */
  modalAddHandler() {
    /**
     * modal opened
     */
    this.modalOption.modal('show');
    $(`${this.modalInput.selector} .modal-content`).addClass('dim');
    this.modalOption.on('hide.bs.modal', () => {
      $(`${this.modalInput.selector} .modal-content`).removeClass('dim');
    });

    /**
     * render input option list
     */
    this.optionInputList.empty();
    this.optionInputList.append(createOptionInput());

    /**
     * callback method
     */
    this.addOptionSection();
    this.removeOptionSection();
    this.optionTableList();
  }
}

export { ModalOption };
