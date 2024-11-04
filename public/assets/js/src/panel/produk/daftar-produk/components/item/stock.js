/**
 * create stock input
 */
const createStockInput = (datas) => {
  const variantStocks = datas.map((data, index) => {
    return `
        <section class="mb-4">
            <div class="flex justify-between">
                <h6 class="text-muted">Variant ${data.name}</h6>
            </div>
            <div class="flex w-full justify-between">
                <div class="form-group mb-2 w-full p-2">
                    <label for="current_stock">Stok saat ini <span class="text-danger">*</span></label>
                    <input type="number" min="0" class="form-control" name="current_stock[]" placeholder="Masukkan stok saat ini">
                </div>
                <div class="form-group mb-2 w-full p-2">
                    <label for="minimal_stock">Stok minimal</label>
                    <input type="number" min="0" class="form-control" name="minimal_stock[]" placeholder="Masukkan stok minimal">
                </div>
            </div>
        </section>
      `;
  });
  return variantStocks.join('');
};

export { createStockInput };
