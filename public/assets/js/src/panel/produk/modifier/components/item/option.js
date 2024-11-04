/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const deleteOptionButton = attributeName()[0]['deleteOptionButton'];

/**
 * create option input
 */
const createOptionInput = (optionName = '', optionPrice = '', index = 0) => {
  const section = `
      <section class="mb-4">
          <div class="flex justify-between">
              <h5 class="h5">Option ${index + 1}</h5>
              <button class="btn btn-danger ${deleteOptionButton}" type="button"><i class="bx bx-trash-alt"></i></button>
          </div>
          <div class="form-group mb-2">
              <label for="name">Nama opsi</label>
              <input type="text" class="form-control" name="option_name[]" placeholder="masukkan nama opsi" value="${optionName}">
          </div>
          <div class="form-group mb-2">
              <label for="name">Harga</label>
              <input type="number" min="0" class="form-control" name="option_price[]" placeholder="masukkan harga opsi" value="${optionPrice}">
          </div>
      </section>
    `;

  return $(section);
};

export { createOptionInput };
