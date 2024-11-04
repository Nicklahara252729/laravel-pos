/**
 * url tipe penjualan
 */
const urlTipePenjualan = {
  false: `/api/backoffice/laporan/tipe-penjualan/data?date=${getValueFromLocalStorage()}`,
  true: `/api/backoffice/laporan/tipe-penjualan/data`,
};

/**
 * get all data tipe penjualan API
 */
const getTipePenjualanAPI = async (url) => {
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
      swalNotFound({ data: 'Tipe Penjualan', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * export tipe penjualan API
 */
const exportTipePenjualanAPI = (uuidOutlet) => {
  return `/laporan/tipe-penjualan/export/${uuidOutlet}`;
};

export { getTipePenjualanAPI, exportTipePenjualanAPI };
