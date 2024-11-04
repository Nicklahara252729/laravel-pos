/**
 * import helper
 */
import { formatCurrency } from '../../../../../helpers/converter.js';

/**
 * row item
 */
const itemElement = (rowData) => {
  const { photo, product_name, varian, harga, jumlah } = rowData;
  return `<li class="p-2 flex justify-between items-center">
          <div class="flex gap-1">
              <img src="${photo}" alt=""
                  class="w-24 mr-3 aspect-square rounded object-center">
              <div class="">
                  <p class="p-0 m-0 text-black">${product_name}</p>
                  <p class="p-0 m-0 text-muted">${varian}</p>
                  <p class="p-0 m-0 text-primary">Rp. ${formatCurrency(harga)}</p>
              </div>
          </div>
          <div>
              <div class="mb-3">
                  <button class="btn btn-primary btn-soft-primary" type="button"> - </button>
                  <span class="ml-3 mr-3">0 / ${formatCurrency(jumlah)}</span>
                  <button class="btn btn-primary btn-soft-primary" type="button"> + </button>
              </div>
          </div>
        </li>`;
};

export { itemElement };
