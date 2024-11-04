/**
 * get all data pelanggan API
 */
const getPelangganAPI = async (page) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pelanggan/data?page=${page}`,
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
      page === 1 ? swalNotFound({ data: 'Pelanggan', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data pelanggan by id API
 */
const getPelangganByIdAPI = async (uuidPelanggan) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pelanggan/get/${uuidPelanggan}`,
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
 * export pelanggan API
 */
const exportPelangganAPI = (uuidOutlet) => {
  return `/pelanggan/export/` + uuidOutlet;
};

/**
 * import pelanggan API
 */
const importPelangganAPI = () => {
  return `/api/backoffice/pelanggan/import`;
};

/**
 * receipt pelanggan API
 */
const receiptPelangganAPI = async (uuidTransaksi) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pelanggan/receipt/${uuidTransaksi}`,
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
 * transaksi pelanggan API
 */
const transaksiPelangganAPI = async (uuidPelanggan) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pelanggan/transaksi/${uuidPelanggan}`,
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
 * search pelanggan API
 */
const searchPelangganAPI = async (keyword) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pelanggan/search?nama=${keyword}`,
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
  getPelangganAPI,
  getPelangganByIdAPI,
  exportPelangganAPI,
  importPelangganAPI,
  transaksiPelangganAPI,
  searchPelangganAPI,
  receiptPelangganAPI,
};
