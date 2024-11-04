/**
 * import repositories
 */
import { getDaftarBahanAPI } from '../../../../ingredient/daftar-bahan/repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined default value
 */
let currentPage = 1;
let isLoading = false;

/**
 * defined component
 */
const recipeInputList = $(`#${attributeName()[0]['recipeInputList']}`);
const choiceSelect = $(`.${attributeName()[0]['choiceSelect']}`);

/**
 * render ingredient select
 */
const renderIngredientSelect = (ingredients) => {
  const ingredientOptions = ingredients
    .map((ingredient) => {
      return `<option value="${ingredient.uuid_ingredient_library}-${ingredient.satuan_pengukuran}-${ingredient.ingredient_name}">${ingredient.ingredient_name}</option>`;
    })
    .join('');
  return ingredientOptions;
};

/**
 * create recipe input
 */
const createRecipeInput = (names, ingredients) => {
  const ingredientOptions = renderIngredientSelect(ingredients);
  const recipeInputs = names.map((name, index) => {
    return `
        <section class="mb-4">
            <h4 class="h4">${name}</h4>
            <div class="form-group mb-2">
                <label for="">Bahan</label>
                <select name="bahan[]" class="form-control choice-select">
                    <option value="" disabled selected>pilih bahan</option>
                    ${ingredientOptions}
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="kuantitas">Kuantitas</label>
                <input type="number" min="0" name="kuantitas[]" id="kuantitas" class="form-control" placeholder="Masukkan kuantitas">
            </div>
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" name="satuan" id="satuan[]" class="form-control" placeholder="Masukkan satuan" disabled>
            </div>
        </section>
      `;
  });
  return recipeInputs.join('');
};

/**
 * initialize
 */
const init = async (options) => {
  const ingredients = await getDaftarBahanAPI(urlDaftarBahan(currentPage));
  const optionNames = options.map((option) => option.name);
  const recipeInputs = createRecipeInput(optionNames, ingredients.data);
  recipeInputList.empty();
  recipeInputList.append(recipeInputs);
  const choiceElements = document.querySelectorAll(choiceSelect.selector);
  choiceElements.forEach((element) => {
    new Choices(element);
  });

  choiceSelect.on('change', function () {
    const value = $(this).val().split('-');
    const satuan = value[1];
    $(this).closest('section').find('input[name="satuan"]').val(satuan);
  });
};

export { init };
