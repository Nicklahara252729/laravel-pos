/**
 * url listing data
 */
function urlNotifikasi(page, dateRange) {
  const queryParam = dateRange ? `&date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/notifikasi/data?page=${page}${queryParam}`;
}
