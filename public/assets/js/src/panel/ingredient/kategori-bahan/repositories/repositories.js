/**
 * get all data kategori API
 */
const getKategoriBahanAPI = async (page) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/ingredient/kategori-bahan/data?page=${page}`,
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
      page === 1 ? swalNotFound({ data: 'Kategori', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data kategori by id API
 */
const getKategoriBahanByIdAPI = async (uuidTax) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/ingredient/kategori-bahan/get/${uuidTax}`,
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
 * delete data kategori API
 */
const deleteKategoriBahanAPI = async (uuidTax) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/ingredient/kategori-bahan/delete/${uuidTax}`,
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
 * update data kategori API
 */
const updateKategoriBahanAPI = (uuidTax) => {
  return `/api/backoffice/ingredient/kategori-bahan/update/${uuidTax}`;
};

/**
 * store data kategori API
 */
const saveKategoriBahanAPI = () => {
  return `/api/backoffice/ingredient/kategori-bahan/save`;
};

/**
 * assign item API
 */
const saveAssignItemAPI = (uuid) => {
  return `/api/backoffice/ingredient/kategori-bahan/assign-item/${uuid}`;
};

export {
  getKategoriBahanAPI,
  getKategoriBahanByIdAPI,
  deleteKategoriBahanAPI,
  updateKategoriBahanAPI,
  saveKategoriBahanAPI,
  saveAssignItemAPI
};
