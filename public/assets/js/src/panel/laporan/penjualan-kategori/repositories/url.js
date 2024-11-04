/**
 * url penjualan kategori
 */
function urlPenjualanKategori(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/laporan/penjualan-kategori/data${queryParam}`;
}
