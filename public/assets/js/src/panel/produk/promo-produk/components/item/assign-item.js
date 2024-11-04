/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const listing = $(`.${attributeName()[0]['assignItemContainer']}`);
const deleteItemButton = attributeName()[0]['deleteItemButton'];

/**
 * product item component
 */
const productItemEl = (row) => {
  const { uuid_item, product_name } = row;
  return `
    <li>
        <input type="checkbox" name="uuid_item[]" value="${uuid_item}" data-item="${product_name}" id="option-${uuid_item}" class="hidden peer">
        <label for="option-${uuid_item}" class="inline-flex items-center justify-between w-full py-2 px-3 text-gray-500 border-[1px] border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white hover:text-gray-600  hover:bg-gray-200 duration-150">                           
            <div class="block">
                <div class="w-full text-sm">${product_name}</div>
            </div>
        </label>
    </li>
    `;
};

/**
 * render item varian
 */
const renderItemVarian = (varian) => {
  const itemVarian = varian
    .map((ingredient) => {
      return `<option value="${ingredient.uuid_ingredient_library}-${ingredient.satuan_pengukuran}-${ingredient.ingredient_name}">${ingredient.ingredient_name}</option>`;
    })
    .join('');
  return itemVarian;
};

/**
 * listing item
 */
const listingItem = (items) => {
  listing.empty();
  if (items && items.length > 0) {
    items.forEach(function (item, index) {
      const rowHtml = `
      <section class="mb-4">
          <div class="form-group mb-2">
              <div class="flex justify-between mb-2">
                  <label class="pt-2">Item ${index + 1}</label>
                  <button class="btn btn-danger ${deleteItemButton}"
                      type="button"><i class="bx bx-trash-alt"></i></button>
              </div>
          </div>

          <div class="d-grid" id="container-certain">
              <div class="flex justify-between mb-2">
                  <div class="form-group">
                      <input type="text" name="jumlah" id="jumlah[]" class="form-control" placeholder="Jumlah">
                  </div>
                  <span class="pt-2"> dari </span>
                  <div class="col-md-8">
                      <input type="text" value="${item.item}" name="item[]" id="item"
                          class="form-control" placeholder="Masukkan item" disabled>

                  </div>
              </div>
              <div class="flex justify-end">
                  <div class="col-md-8">
                      <div class="form-group mb-2">
                          <label for="varian">Varian</label>
                          <select name="bahan[]" class="form-control choice-select">
                              <option value="" disabled selected>pilih bahan</option>

                          </select>
                      </div>
                  </div>
              </div>
      </section>
        `;
      listing.append(rowHtml);
    });
  }
};

/**
 * listing kategori
 */
const listingKategori = (items) => {
  const listing = $(`.${attributeName()[0]['assignItemContainer']}`);
  listing.empty();

  if (items && items.length > 0) {
    items.forEach(function (item, index) {
      const rowHtml = `
      <section class="mb-4">
          <div class="form-group mb-2">
              <div class="flex justify-between mb-2">
                  <label class="pt-2">Item ${index + 1}</label>
                  <button class="btn btn-danger ${deleteItemButton}"
                      type="button"><i class="bx bx-trash-alt"></i></button>
              </div>
          </div>

          <div class="d-grid" id="container-certain">
              <div class="flex justify-between mb-2">
                  <div class="form-group">
                      <input type="text" name="jumlah" id="jumlah[]" class="form-control" placeholder="Jumlah">
                  </div>
                  <span class="pt-2"> dari </span>
                  <div class="col-md-8">
                    <select name="kategori[]" class="form-control choice-select">
                        <option value="" disabled selected>Pilih Kategori</option>

                    </select>
                  </div>
              </div>
      </section>
        `;
      listing.append(rowHtml);
    });
  }
};

export { productItemEl, listingItem, listingKategori };
