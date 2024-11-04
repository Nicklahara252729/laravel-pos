/**
 * url pajak
 */
const urlPajak = {
  false: `/api/backoffice/laporan/pajak/data`,
  true: `/api/backoffice/laporan/pajak/data?date=${getValueFromLocalStorage()}`,
};

/**
 * get all data pajak API
 */
const getPajakAPI = async (url) => {
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
      swalNotFound({ data: 'Pajak', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * export pajak API
 */
const exportPajakAPI = (uuidOutlet) => {
  return `/laporan/pajak/export/${uuidOutlet}`;
};

export { getPajakAPI, exportPajakAPI };
