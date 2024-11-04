/**
 * url metode pembayaran
 */
function urlMetodePembayaran(dateRange) {
  return dateRange
    ? `/api/backoffice/laporan/metode-pembayaran/data?date=${getValueFromLocalStorage()}`
    : `/api/backoffice/laporan/metode-pembayaran/data`;
}

/**
 * get all data metode pembayaran API
 */
const getMetodePembayaranAPI = async (url) => {
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
      swalNotFound({ data: 'Metode Pembayaran', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * export metode pembayaran API
 */
const exportMetodePembayaranAPI = (uuidOutlet) => {
  return `/laporan/metode-pembayaran/export/${uuidOutlet}`;
};

export { getMetodePembayaranAPI, exportMetodePembayaranAPI };
