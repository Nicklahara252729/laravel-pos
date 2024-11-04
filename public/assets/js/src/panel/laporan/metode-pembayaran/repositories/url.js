/**
 * url metode pembayaran
 */
function urlMetodePembayaran(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/laporan/metode-pembayaran/data${queryParam}`;
}
