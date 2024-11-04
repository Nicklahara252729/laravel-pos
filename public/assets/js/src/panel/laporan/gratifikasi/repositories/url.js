/**
 * url gratifikasi
 */
function urlGratifikasi(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/laporan/gratifikasi/data${queryParam}`;
}
