/**
 * url ringkasan laporan
 */
function urlRingkasanLaporan(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/laporan/ringkasan-laporan/data${queryParam}`;
}
