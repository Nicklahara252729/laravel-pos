/**
 * url keutungan kotor
 */
function urlKeuntunganKotor(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/laporan/keuntungan-kotor/data${queryParam}`;
}
