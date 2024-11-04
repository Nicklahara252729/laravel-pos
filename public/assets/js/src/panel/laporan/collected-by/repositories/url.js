/**
 * url collected by
 */
function urlCollectedBy(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/laporan/collected-by/data${queryParam}`;
}
