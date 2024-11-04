/**
 * get all promo produk API
 */
const getPromoProdukAPI = async (url) => {
  try {
    const response = await sendApiRequest(
      {
        url: url,
        type: 'GET',
      },
      {
        isLoading: true,
        outlet: false,
      }
    );
    return response.data;
  } catch (e) {
    if (e.status == 404) {
      page === 1 ? swalNotFound({ data: 'Promo Produk', in: 'Sistem' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get promo produk by id API
 */
const getPromoProdukByIdAPI = async (uuidPromo) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/promo-produk/get/${uuidPromo}`,
        type: 'GET',
      },
      {
        isLoading: true,
        outlet: false,
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
 * delete promo produk API
 */
const deletePromoProdukAPI = async (uuidPromo) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/promo-produk/delete/${uuidPromo}`,
        type: 'DELETE',
      },
      {
        isLoading: true,
        outlet: false,
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
 * update promo produk API
 */
const updatePromoProdukAPI = (uuidPromo) => {
  return `/api/backoffice/produk/promo-produk/update/${uuidPromo}`;
};

/**
 * save promo produk API
 */
const savePromoProdukAPI = () => {
  return `/api/backoffice/produk/promo-produk/save`;
};

export {
  getPromoProdukAPI,
  getPromoProdukByIdAPI,
  deletePromoProdukAPI,
  updatePromoProdukAPI,
  savePromoProdukAPI,
};
