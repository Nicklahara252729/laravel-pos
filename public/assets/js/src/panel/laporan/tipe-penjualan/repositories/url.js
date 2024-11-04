/**
 * url tipe penjualan
 */
function urlTipePenjualan(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/laporan/tipe-penjualan/data${queryParam}`;
}
