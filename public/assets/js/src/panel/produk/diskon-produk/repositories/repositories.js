/**
 * get all data discount product API
 */
const getDiskonProdukAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: '/api/backoffice/produk/diskon-produk/data',
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
      swalNotFound({ data: 'Diskon Produk', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data discount product by id API
 */
const getDiskonProdukByIdAPI = async (uuidDiscount) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/diskon-produk/get/${uuidDiscount}`,
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
 * delete diskon produk API
 */
const deleteDiskonProdukAPI = async (uuidDiscount) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/diskon-produk/delete/${uuidDiscount}`,
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
 * update data discount product API
 */
const updateDiskonProdukAPI = (uuidDiscount) => {
  return `/api/backoffice/produk/diskon-produk/update/${uuidDiscount}`;
};

/**
 * save data discount product API
 */
const saveDiskonProdukAPI = () => {
  return `/api/backoffice/produk/diskon-produk/save`;
};

export {
  getDiskonProdukAPI,
  getDiskonProdukByIdAPI,
  deleteDiskonProdukAPI,
  updateDiskonProdukAPI,
  saveDiskonProdukAPI,
};
