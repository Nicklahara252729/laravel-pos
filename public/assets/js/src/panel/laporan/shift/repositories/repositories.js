/**
 * url shift
 */
const urlShift = {
  false: `/api/backoffice/laporan/shift/data`,
  true: `/api/backoffice/laporan/shift/data?date=${getValueFromLocalStorage()}`,
};

/**
 * get all data shift API
 */
const getShiftAPI = async (url) => {
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
      swalNotFound({ data: 'Shift', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * export shift API
 */
const exportShiftAPI = (uuidOutlet, jenisExport) => {
  return `/laporan/shift/export/${jenisExport}/${uuidOutlet}`;
};

export { getShiftAPI, exportShiftAPI };
