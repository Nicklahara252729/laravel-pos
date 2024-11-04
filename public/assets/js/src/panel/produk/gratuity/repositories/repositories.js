/**
 * get all data API
 */
const getGratuityAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: '/api/backoffice/produk/gratuity/data',
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
      swalNotFound({ data: 'Gratifikasi', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data gratuity by id API
 */
const getGratuityByIdAPI = async (uuidGratuity) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/gratuity/get/${uuidGratuity}`,
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
 * delete data gratuity API
 */
const deleteDataGratuityAPI = async (uuidGratuity) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/gratuity/delete/${uuidGratuity}`,
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
 * update data gratuity API
 */
const updateDataGratuityAPI = (uuidGratuity) => {
  return `/api/backoffice/produk/gratuity/update/${uuidGratuity}`;
};

/**
 * save data gratuity API
 */
const saveDataGratuityAPI = () => {
  return `/api/backoffice/produk/gratuity/save`;
};

export {
  getGratuityAPI,
  getGratuityByIdAPI,
  deleteDataGratuityAPI,
  updateDataGratuityAPI,
  saveDataGratuityAPI,
};
