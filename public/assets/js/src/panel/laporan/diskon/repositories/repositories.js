/**
 * url diskon
 */
const urlDiskon = {
  false: `/api/backoffice/laporan/diskon/data`,
  true: `/api/backoffice/laporan/diskon/data?date=${getValueFromLocalStorage()}`,
};

/**
 * get all data diskon API
 */
const getDiskonAPI = async (url) => {
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
      swalNotFound({ data: 'Diskon', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * export diskon API
 */
const exportDiskonAPI = (uuidOutlet) => {
  return `/laporan/diskon/export/${uuidOutlet}`;
};

export { getDiskonAPI, exportDiskonAPI };
