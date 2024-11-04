/**
 * url collected by
 */
function urlCollectedBy(dateRange) {
  return dateRange
    ? `/api/backoffice/laporan/collected-by/data?date=${getValueFromLocalStorage()}`
    : `/api/backoffice/laporan/collected-by/data`;
}

/**
 * get all data collected by API
 */
const getCollectedByAPI = async (url) => {
  try {
    const response = await sendApiRequest(
      {
        url: url,
        type: 'GET',
      },
      {
        isLoading: true,
        outlet: true,
      }
    );
    return response.data;
  } catch (e) {
    if (e.status == 404) {
      swalNotFound({ data: 'Collected By', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * export collected by API
 */
const exportCollectedByAPI = (uuidOutlet) => {
  return `/laporan/collected-by/export/${uuidOutlet}`;
};

export { getCollectedByAPI, exportCollectedByAPI };
