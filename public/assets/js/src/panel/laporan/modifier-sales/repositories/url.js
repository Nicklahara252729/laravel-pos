/**
 * url modifier sales
 */
function urlModifierSales(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/laporan/modifier-sales/data${queryParam}`;
}
