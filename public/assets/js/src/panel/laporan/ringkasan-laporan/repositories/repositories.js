/**
 * url ringkasan laporan
 */
const urlRingkasanLaporan = {
  false: `/api/backoffice/laporan/ringkasan-laporan/data`,
  true: `/api/backoffice/laporan/ringkasan-laporan/data?date=${getValueFromLocalStorage()}`,
};

/**
 * get all data ringkasan laporan API
 */
const getRingkasanLaporanAPI = async (url) => {
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
      swalNotFound({ data: 'Ringkasan Laporan', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * export ringkasan laporan API
 */
const exportRingkasanLaporanAPI = (uuidOutlet) => {
  return `/laporan/ringkasan-laporan/export/${uuidOutlet}`;
};

export { getRingkasanLaporanAPI, exportRingkasanLaporanAPI };
