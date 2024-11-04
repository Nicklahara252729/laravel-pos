/**
 * url keutungan kotor
 */
const urlKeuntunganKotor = {
  false: `/api/backoffice/laporan/keuntungan-kotor/data`,
  true: `/api/backoffice/laporan/keuntungan-kotor/data?date=${getValueFromLocalStorage()}`,
};

/**
 * get all data keuntungan kotor API
 */
const getKeutunganKotorAPI = async (url) => {
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
      swalNotFound({ data: 'Keuntungan Kotor', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * export keuntungan kotor API
 */
const exportKeuntunganKotorAPI = (uuidOutlet) => {
  return `/laporan/keuntungan-kotor/export/${uuidOutlet}`;
};

export { getKeutunganKotorAPI, exportKeuntunganKotorAPI };
