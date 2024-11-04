/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const recipeInputList = $(`#${attributeName()[0]['recipeInputList']}`);
const tableBody = $(`#${attributeName()[0]['tableRecipe']} tbody`);

/**
 * create receipt table
 */
const createObjectRecipeTable = () => {
  const objectData = [];

  // Iterate through the table rows
  $(`${recipeInputList.selector} section`).each(function () {
    const section = $(this);

    // Get the data from each cell in the row
    const bahanValue = section.find('select[name="bahan[]"]').val().split('-');
    const satuan = bahanValue[1];
    const bahan = bahanValue[2];
    const name = section.find('h4').text();
    const ingredient = bahan;
    const quantity = section.find('input[name="kuantitas[]"]').val();
    const unit = satuan;

    // Create an object for the row data
    const rowData = {
      name: name,
      ingredient: ingredient,
      quantity: quantity,
      unit: unit,
    };

    // Push the row object to the objectData array
    objectData.push(rowData);
  });

  return objectData;
};

/**
 * render recipe table
 */
const renderRecipeTable = (options) => {
  tableBody.empty();
  options.forEach(function (option) {
    const rowHtml = `
      <tr>
        <td>${option.name}</td>
        <td>${option.ingredient}</td>
        <td class="text-center">${option.quantity}</td>
        <td class="text-right">${option.unit}</td>
      </tr>
    `;
    tableBody.append(rowHtml);
  });
};

export { createObjectRecipeTable, renderRecipeTable };
