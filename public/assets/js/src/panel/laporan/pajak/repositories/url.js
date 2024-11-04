/**
 * url pajak
 */
function urlPajak(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/laporan/pajak/data${queryParam}`;
}
