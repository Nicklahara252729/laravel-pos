/**
 * get all data pajak API
 */
const getPajakProdukAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: '/api/backoffice/produk/pajak-produk/data',
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
      swalNotFound({ data: 'Pajak Produk', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data pajak by id API
 */
const getPajakProdukByIdAPI = async (uuidTax) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/pajak-produk/get/${uuidTax}`,
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
 * delete data pajak API
 */
const deletePajakProdukAPI = async (uuidTax) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/pajak-produk/delete/${uuidTax}`,
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
 * update data pajak API
 */
const updatePajakProdukAPI = (uuidTax) => {
  return `/api/backoffice/produk/pajak-produk/update/${uuidTax}`;
};

/**
 * save data pajak API
 */
const savePajakProdukAPI = () => {
  return `/api/backoffice/produk/pajak-produk/save`;
};

export {
  getPajakProdukAPI,
  getPajakProdukByIdAPI,
  deletePajakProdukAPI,
  updatePajakProdukAPI,
  savePajakProdukAPI,
};
