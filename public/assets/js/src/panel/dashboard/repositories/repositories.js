/**
 * url dashboard
 */
const urlDashboard = {
  false: `/api/backoffice/dashboard/data`,
  true: `/api/backoffice/dashboard/data?date=${getValueFromLocalStorage()}`,
};

/**
 * get all data dashboard API
 */
const getDashbaordAPI = async (url) => {
  try {
    const response = await sendApiRequest(
      {
        url: url,
        type: 'GET',
      },
      {
        isLoading: false,
        outlet: true,
      }
    );
    return response.data;
  } catch (e) {
    if (e.status == 404) {
      swalNotFound({ data: 'Transaksi', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

export { getDashbaordAPI };
