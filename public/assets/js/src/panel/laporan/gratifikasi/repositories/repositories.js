/**
 * url gratifikasi
 */
const urlGratifikasi = {
  false: `/api/backoffice/laporan/gratifikasi/data`,
  true: `/api/backoffice/laporan/gratifikasi/data?date=${getValueFromLocalStorage()}`,
};

/**
 * get all data gratifikasi API
 */
const getGratifikasiAPI = async (url) => {
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
 * export gratifikasi API
 */
const exportGratifikasiAPI = (uuidOutlet) => {
  return `/laporan/gratifikasi/export/${uuidOutlet}`;
};

export { getGratifikasiAPI, exportGratifikasiAPI };
