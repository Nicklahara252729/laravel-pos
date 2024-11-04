/**
 * url diskon
 */
function urlDiskon(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/laporan/diskon/data${queryParam}`;
}
