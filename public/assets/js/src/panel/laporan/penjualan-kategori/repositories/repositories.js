/**
 * url penjualan kategori
 */
function urlPenjualanKategori(dateRange) {
  return dateRange
    ? `/api/backoffice/laporan/penjualan-kategori/data?date=${getValueFromLocalStorage()}`
    : `/api/backoffice/laporan/penjualan-kategori/data`;
}

/**
 * get all data penjualan kategori API
 */
const getPenjualanKategoriAPI = async (url) => {
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
      swalNotFound({ data: 'Penjualan Kategori', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * export penjualan kategori API
 */
const exportPenjualanKategoriAPI = (uuidOutlet) => {
  return `/laporan/penjualan-kategori/export/${uuidOutlet}`;
};

export { getPenjualanKategoriAPI, exportPenjualanKategoriAPI };
