/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { salesTypeInputEl } from './tipe-penjualan.js';

/**
 * defined component
 */
const deleteVariantItemButton = attributeName()[0]['deleteVariantItemButton'];

/**
 * create variant input
 */
const createVariantInput = (variantName = '', variantPrice = '', index = 0) => {
  const section = `
      <section class="mb-4">
            <div class="flex justify-between">
                <h6 class="text-muted mt-2">Variant ${index + 1}</h6>
                <button class="btn btn-danger ${deleteVariantItemButton}" type="button"><i class="bx bx-trash-alt"></i></button>
            </div>
            <div class="flex w-full justify-between">
                <div class="form-group mb-2 w-full p-2">
                    <label for="variant_name">Nama Variant <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="variant_name[]" placeholder="Masukkan variant"
                        value="${variantName}">
                </div>
                <div class="form-group mb-2 w-full p-2">
                    <label for="variant_sku">SKU</label>
                    <input type="text" class="form-control" name="variant_sku[]" placeholder="Masukkan SKU"
                        value="">
                </div>
            </div>
            <div class="form-group mb-2 p-2">
                <label for="variant_price">Harga <span class="text-danger">*</span></label>
                <input type="number" min="0" class="form-control" name="variant_price[]" placeholder="Masukkan harga produk"
                    value="${variantPrice}">
            </div>
        </section>
    `;

  return $(section);
};

/**
 * create variant sales type input
 */
const createVariantSalesTypeInput = (dataTipePenjualan, index = 0) => {
  const salesTypeOptions = salesTypeInputEl(dataTipePenjualan);
  const section = `
        <section class="mb-4">
              <div class="flex justify-between">
                  <h6 class="text-muted mt-2">Variant ${index + 1}</h6>
                  <button class="btn btn-danger ${deleteVariantItemButton}" type="button"><i class="bx bx-trash-alt"></i></button>
              </div>
              <div class="flex w-full justify-between">
                  <div class="form-group mb-2 w-full p-2">
                      <label for="variant_name">Nama Variant <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="variant_name[]" placeholder="Masukkan variant">
                  </div>
                  <div class="form-group mb-2 w-full p-2">
                      <label for="variant_sku">SKU</label>
                      <input type="text" class="form-control" name="variant_sku[]" placeholder="Masukkan SKU">
                  </div>
              </div>
              ${salesTypeOptions}
          </section>
      `;

  return $(section);
};

export { createVariantInput, createVariantSalesTypeInput };
