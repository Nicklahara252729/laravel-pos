/**
 * import helper
 */
import { formatCurrency, capitalizeFirstLetter } from '../../../../../../helpers/converter.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const list = $(`#${attributeName()[0]['detailProdukList']}`);

/**
 * variant list element
 */
const variantListEl = (rowData) => {
  const variant = rowData
    .map((datas, index) => {
      const variantName = capitalizeFirstLetter(datas.name);
      const variantPrice = formatCurrency(datas.price);
      return `<li class="flex justify-between"><span>${variantName}</span></span> Rp ${variantPrice}</span></li>`;
    })
    .join('');
  return variant;
};

/**
 * modifier list element
 */
const modifierListEl = (rowData) => {
  const modifier = rowData
    .map((datas, index) => {
      const modifierName = capitalizeFirstLetter(datas.name);
      const modifierPrice = formatCurrency(datas.price);
      return `<li class="flex justify-between"><span>${modifierName}</span></span> Rp ${modifierPrice}</span></li>`;
    })
    .join('');
  return modifier;
};

/**
 * detail element
 * @param {*} datas
 */
const productEl = (datas) => {
  list.empty();
  if (datas && datas.length > 0) {
    datas.forEach(function (data) {
      const price = formatCurrency(data.price);
      const promoPrice = formatCurrency(data.promo.price);
      const variantList = variantListEl(data.variant);
      const modifierList = modifierListEl(data.modifier);
      const rowHtml = `
                        <li>
                            <div class="flex justify-between">
                                <div class="text-left">${capitalizeFirstLetter(data.name)}</div>
                                <div class="text-center font-medium">X${data.jumlah}</div>
                                <div class="text-right font-medium">Rp ${price}</div>
                            </div>
                            <div class="text-muted">Variant</div>
                            <ul id="detail-variant-list" class="text-muted">
                                ${variantList}
                            </ul>
                            <div class="text-muted">Modifier</div>
                            <ul id="detail-modifier-list" class="text-muted">
                                ${modifierList}
                            </ul>
                            <div class="text-muted">Promo</div>
                            <div class="flex justify-between">
                                <div class="text-muted text-left">${capitalizeFirstLetter(
                                  data.promo.name
                                )}</div>
                                <div class="text-muted text-right">Rp ${promoPrice}</div>
                            </div>
                        </li>
        `;
      list.append(rowHtml);
    });
  }
};

/**
 * row item
 */
const itemElement = (datas) => {
  let rowHtml = '';
  if (datas && datas.length > 0) {
    datas.forEach(function (data) {
      const price = formatCurrency(data.price);
      const jumlah = formatCurrency(data.jumlah);
      const variantList = variantListEl(data.variant);
      const modifierList = modifierListEl(data.modifier);

      rowHtml += `<li class="p-2 flex justify-between items-center">
                      <div class="flex gap-1">
                          <img src="${data.photo}" alt=""
                              class="w-24 mr-3 aspect-square rounded object-center">
                          <div>
                              <p class="p-0 m-0 text-black">${data.name}</p>
                              <p class="p-0 m-0">
                                <ul class="text-muted">
                                  ${variantList}
                                </ul>
                              </p>
                              <p class="p-0 m-0">
                                <ul class="text-muted">
                                  ${modifierList}
                                </ul>
                              </p>
                              <p class="p-0 m-0 text-primary">Rp. ${price}</p>
                          </div>
                      </div>
                      <div>
                          <div class="mb-3"> 
                              <span class="ml-3 mr-3">${jumlah} item</span>                  
                          </div>
                      </div>
                    </li>`;
    });
  }
  return rowHtml;
};

export { productEl, itemElement };
