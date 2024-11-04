/**
 * get all data daftar bahan API
 */
const getDaftarBahanAPI = async (url) => {
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
    return response.data.data;
  } catch (e) {
    if (e.status == 404) {
      swalNotFound({ data: 'Daftar Bahan', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data daftar bahan by id API
 */
const getDaftarBahanByIdAPI = async (uuidIngredient) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/ingredient/daftar-bahan/get/${uuidIngredient}`,
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
 * delete data daftar bahan API
 */
const deleteDaftarBahanAPI = async (uuidIngredient) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/ingredient/daftar-bahan/delete/${uuidIngredient}`,
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
 * update data daftar bahan API
 */
const updateDaftarBahanAPI = (uuidIngredient) => {
  return `/api/backoffice/ingredient/daftar-bahan/update/${uuidIngredient}`;
};

/**
 * store data daftar bahan API
 */
const saveDaftarBahanAPI = () => {
  return `/api/backoffice/ingredient/daftar-bahan/save`;
};

/**
 * export daftar bahan API
 */
const exportDaftarBahanAPI = (uuidOutlet) => {
  return `/ingredient/daftar-bahan/export/${uuidOutlet}`;
};

/**
 * import change daftar bahan API
 */
const importChangeDaftarBahanAPI = () => {
  return `/api/backoffice/ingredient/daftar-bahan/import/change`;
};

/**
 * import replace daftar bahan API
 */
const importReplaceDaftarBahanAPI = () => {
  return `/api/backoffice/ingredient/daftar-bahan/import/replace`;
};

export {
  getDaftarBahanAPI,
  getDaftarBahanByIdAPI,
  deleteDaftarBahanAPI,
  updateDaftarBahanAPI,
  saveDaftarBahanAPI,
  exportDaftarBahanAPI,
  importChangeDaftarBahanAPI,
  importReplaceDaftarBahanAPI,
};
