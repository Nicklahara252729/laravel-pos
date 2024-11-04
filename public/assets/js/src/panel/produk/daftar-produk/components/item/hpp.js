/**
 * create stock input
 */
const createHppInput = (datas) => {
  const variantStocks = datas.map((data, index) => {
    return `
        <section class="mb-4">
            <div class="flex justify-between">
                <h6 class="text-muted">Variant ${data.name}</h6>
            </div>
            <div class="form-group w-full">
                <label for="average_price">Biaya rata - rata <span class="text-danger">*</span></label>
                <input type="number" min="0" class="form-control" name="average_price[]" placeholder="Masukkan biaya rata - rata produk">
            </div>
        </section>
      `;
  });
  return variantStocks.join('');
};

export { createHppInput };
