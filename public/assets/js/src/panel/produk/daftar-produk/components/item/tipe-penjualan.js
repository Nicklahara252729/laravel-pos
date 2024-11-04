/**
 * import helper
 */
import { capitalizeFirstLetter } from '../../../../../../helpers/converter.js';

/**
 * tipe penjualan input list element
 */
const salesTypeInputEl = (rowData) => {
  const salesTypeInput = rowData
    .map((datas, index) => {
      const salesTypeName = capitalizeFirstLetter(datas.sales_type_name);
      return `<div class="form-group mb-2">
                  <label for="sales-type-input" class="text-black">Harga Produk ${salesTypeName} <span class="text-danger">*</span></label>
                  <input type="number" min="0" class="form-control" id="sales-type-input-${index}" name="sales_type_input[]"
                      placeholder="Masukkan harga produk" data-salestype="${datas.uuid_sales_type}">
              </div>`;
    })
    .join('');
  return salesTypeInput;
};

export { salesTypeInputEl };
