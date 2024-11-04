/**
 * url shift
 */
function urlShift(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/laporan/shift/data${queryParam}`;
}
