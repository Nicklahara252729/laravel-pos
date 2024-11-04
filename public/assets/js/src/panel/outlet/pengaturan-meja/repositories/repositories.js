/**
 * static value
 */
let uuidOutlet = getDefaultOutletUuid();

/**
 * listing data grup meja API
 * @param {*} url
 * @returns
 */
const getGrupMejaAPI = async (url) => {
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
      page === 1 ? swalNotFound({ data: 'Grup Meja', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * search data grup meja API
 * @param {*} url
 * @returns
 */
const searchGrupMejaAPI = async (url) => {
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
      page === 1 ? swalNotFound({ data: 'Grup Meja', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get grup meja by id API
 */
const getGrupMejaByIdAPI = async (uuidTable) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/outlet/pengaturan-meja/grup-meja/get/${uuidTable}`,
        type: 'GET',
      },
      {
        isLoading: true,
        outlet: true,
      }
    );
    return response.data;
  } catch (error) {
    const { responseJSON } = error;
    const message = error instanceof ReferenceError ? error.message : responseJSON.message;
    swalError(message);
  }
};

/**
 * duplicate grup meja API
 */
const duplicateGrupMejaAPI = async (uuidTable) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/outlet/pengaturan-meja/grup-meja/duplicate/${uuidTable}`,
        type: 'PUT',
      },
      {
        isLoading: true,
        outlet: true,
      }
    );
    return response;
  } catch (error) {
    const { responseJSON } = error;
    const message = error instanceof ReferenceError ? error.message : responseJSON.message;
    swalError(message);
  }
};

/**
 * update grup meja API
 */
const updateGrupMejaAPI = (uuidTable) => {
  return `/api/backoffice/outlet/pengaturan-meja/grup-meja/update/${uuidTable}`;
};

/**
 * asve grup meja API
 */
const saveGrupMejaAPI = () => {
  return `/api/backoffice/outlet/pengaturan-meja/grup-meja/save`;
};

/**
 * atur meja grup meja API
 */
const aturGrupMejaAPI = (uuidTable) => {
  return `/api/backoffice/outlet/pengaturan-meja/grup-meja/atur-meja/${uuidTable}`;
};

/**
 * delete grup meja API
 */
const deleteGrupMejaAPI = async (uuidTable) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/outlet/pengaturan-meja/grup-meja/delete/${uuidTable}`,
        type: 'DELETE',
      },
      {
        isLoading: true,
        outlet: true,
      }
    );
    return response;
  } catch (error) {
    const { responseJSON } = error;
    const message = error instanceof ReferenceError ? error.message : responseJSON.message;
    swalError(message);
  }
};

/**
 * get total laporan API
 */
const getTotalLaporanAPI = async (url) => {
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
    if (e.status != 404) {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * listing data laporan API
 * @param {*} url
 * @returns
 */
const getLaporanAPI = async (url) => {
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
      page === 1 ? swalNotFound({ data: 'Pengaturan Meja Laporan', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * search data laporan API
 * @param {*} url
 * @returns
 */
const searchLaporanAPI = async (url) => {
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
      page === 1 ? swalNotFound({ data: 'Pengaturan Meja Search', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get laporan transaksi API
 */
const getLaporanTransaksiAPI = async (uuidTable) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/outlet/pengaturan-meja/laporan/transaksi/${uuidTable}`,
        type: 'GET',
      },
      {
        isLoading: true,
        outlet: true,
      }
    );
    return response.data;
  } catch (error) {
    const { responseJSON } = error;
    const message = error instanceof ReferenceError ? error.message : responseJSON.message;
    swalError(message);
  }
};

/**
 * export laporan void API
 */
const exportLaporanVoidAPI = (uuidOutlet) => {
  return `/outlet/pengaturan-meja/export/laporan/void/${uuidOutlet}`;
};

/**
 * get laporan void API
 */
const getLaporanVoidAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/outlet/pengaturan-meja/laporan/void/${uuidOutlet}`,
        type: 'GET',
      },
      {
        isLoading: true,
        outlet: true,
      }
    );
    return response.data;
  } catch (error) {
    const { responseJSON } = error;
    const message = error instanceof ReferenceError ? error.message : responseJSON.message;
    swalError(message);
  }
};

export {
  getGrupMejaAPI,
  searchGrupMejaAPI,
  getGrupMejaByIdAPI,
  duplicateGrupMejaAPI,
  updateGrupMejaAPI,
  saveGrupMejaAPI,
  aturGrupMejaAPI,
  deleteGrupMejaAPI,
  getTotalLaporanAPI,
  getLaporanAPI,
  getLaporanTransaksiAPI,
  searchLaporanAPI,
  exportLaporanVoidAPI,
  getLaporanVoidAPI,
};
