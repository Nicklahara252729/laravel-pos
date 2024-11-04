/**
 * set attribute value
 * @returns
 */
const attributeName = () => {
  const data = [
    {
      /**
       * table
       */
      table: 'table-modifier',
      tableRecipe: 'recipe-table',
      tableOption: 'option-table',

      /**
       * button
       */
      addButton: 'add-button',
      editButton: 'edit-button',
      deleteButton: 'delete-button',
      openModalButton: 'open-modal-button',
      submitButton: 'submit-modifier-button',
      detailButton: 'detail-button',
      addRecipeButton: 'add-recipe-button',
      addOptionButton: 'add-option-button',
      isRecipeSwitch: 'is-recipe-switch',
      submitOptionButton: 'submit-option-button',
      submitRecipeButton: 'submit-recipe-button',
      deleteOptionButton: 'delete-option-button',
      isLimitSwitch: 'is-limit-switch',
      addOtherOptionButton: 'add-other-option-button',
      assignItemButton: 'assign-item-button',
      submitAssignItemButton: 'submit-assign-item-button',

      /**
       * modal
       */
      modalRecipe: 'modal-recipe',
      modalInput: 'modal-input',
      modalOption: 'modal-option',
      modalInputTitle: 'modal-input-title',
      modalAssignItem: 'modal-assign-item',
      modalDetail: 'modal-detail',

      /**
       * container
       */
      isRecipeContainer: 'is-recipe-container',
      isLimitContainer: 'is-limit-container',
      detailOption: 'detail-option',
      detailRecipe: 'detail-recipe',

      /**
       * widget
       */
      recipeInputList: 'recipe-input-list',
      optionInputList: 'option-input-list',
      detailModifierItem: 'detail-modifier-item',

      /**
       * form
       */
      formInput: 'form-input',
      formAssignItem: 'form-assign-item',
      productList: 'product-list',
      searchProductList: 'search-product-list',
      formRecipe: 'form-recipe',
      choiceSelect: 'choice-select',
    },
  ];
  return data;
};

export { attributeName };
