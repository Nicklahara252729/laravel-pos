/**
 * get all data tipe penjualan API
 */
const getTipePenjualanAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: '/api/backoffice/produk/tipe-penjualan/data',
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
 * get data tipe penjualan by id API
 */
const getTipePenjualanByIdAPI = async (uuidSalesType) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/tipe-penjualan/get/${uuidSalesType}`,
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
 * delete data tipe penjualan API
 */
const deleteTipePenjualanAPI = async (uuidSalesType) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/tipe-penjualan/delete/${uuidSalesType}`,
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
 * update data tipe penjualan API
 */
const updateTipePenjualanAPI = (uuidSalesType) => {
  return `/api/backoffice/produk/tipe-penjualan/update/${uuidSalesType}`;
};

/**
 * save data tipe penjualan API
 */
const saveTipePenjualaAPI = () => {
  return `/api/backoffice/produk/tipe-penjualan/save`;
};

export {
  getTipePenjualanAPI,
  getTipePenjualanByIdAPI,
  deleteTipePenjualanAPI,
  updateTipePenjualanAPI,
  saveTipePenjualaAPI,
};
