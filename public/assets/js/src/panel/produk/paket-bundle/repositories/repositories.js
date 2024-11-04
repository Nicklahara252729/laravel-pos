/**
 * get all paket bundle API
 */
const getPaketBundleAPI = async (page) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/paket-bundle/data/?page=${page}`,
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
      page === 1 ? swalNotFound({ data: 'Paket Bundle', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get paket bundle by id API
 */
const getPaketBundleByIdAPI = async (uuidTax) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/paket-bundle/get/${uuidTax}`,
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
 * delete paket bundle API
 */
const deletePaketBundleAPI = async (uuidTax) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/paket-bundle/delete/${uuidTax}`,
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
 * update paket bundle API
 */
const updatePaketBundleAPI = (uuidTax) => {
  return `/api/backoffice/produk/paket-bundle/update/${uuidTax}`;
};

/**
 * save paket bundle API
 */
const savePaketBundleAPI = () => {
  return `/api/backoffice/produk/paket-bundle/save`;
};

export {
  getPaketBundleAPI,
  getPaketBundleByIdAPI,
  deletePaketBundleAPI,
  updatePaketBundleAPI,
  savePaketBundleAPI,
};
