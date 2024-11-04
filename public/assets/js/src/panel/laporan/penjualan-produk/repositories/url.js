/**
 * url penjualan produk income
 */
function urlIncomePenjualanProduk(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/laporan/penjualan-produk/data/income${queryParam}`;
}

/**
 * url penjualan produk quantity
 */
function urlQuantityPenjualanProduk(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/laporan/penjualan-produk/data/quantity${queryParam}`;
}
