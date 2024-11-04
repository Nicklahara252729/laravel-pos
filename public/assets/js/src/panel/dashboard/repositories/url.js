/**
 * url dashboard
 */
function urlDashboard(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/dashboard/data${queryParam}`;
}
