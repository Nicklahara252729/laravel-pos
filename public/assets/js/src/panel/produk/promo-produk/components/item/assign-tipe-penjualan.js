/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defiend component
 */
const listing = $(`#${attributeName()[0]['assignTipePenjualanList']}`);

/**
 * tipe penjualan item component
 */
const tipePenjualanItemEl = (row) => {
  const { uuid_sales_type, sales_type_name, sales_status, gratuity_name, gratuity_amount } = row;
  return `<li>
            <input type="checkbox" name="uuid_sales_type[]" value="${uuid_sales_type}" data-sales_type="${sales_type_name}" id="option-${uuid_sales_type}" class="hidden peer">
            <label for="option-${uuid_sales_type}" class="inline-flex items-center justify-between w-full py-2 px-3 text-gray-500 border-[1px] border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white hover:text-gray-600  hover:bg-gray-200 duration-150">                           
                <div class="block">
                    <div class="w-full text-sm">${sales_type_name}</div>
                </div>
            </label>
        </li>`;
};

/**
 * listing tipe penjualan
 */
const listingTipePenjualan = (salesTypes) => {
  listing.empty();

  if (salesTypes && salesTypes.length > 0) {
    salesTypes.forEach(function (salesType) {
      const rowHtml = `<li>${salesType.salesType}</li>`;
      listing.append(rowHtml);
    });
  }
};

export { tipePenjualanItemEl, listingTipePenjualan };
