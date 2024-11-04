/**
 * get all data resep API
 */
const getResepAPI = async (url) => {
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
      swalNotFound({ data: 'Resep', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data resep by id API
 */
const getResepByIdAPI = async (uuidItem) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/ingredient/resep/get/${uuidItem}`,
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
 * delete resep API
 */
const deleteResepAPI = async (uuidItem) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/ingredient/resep/delete/${uuidItem}`,
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
 * store data resep API
 */
const saveResepAPI = () => {
  return `/api/backoffice/ingredient/resep/save`;
};

/**
 * update data resep API
 */
const updateResepAPI = (uuidItem) => {
  return `/api/backoffice/ingredient/resep/update/${uuidItem}`;
};

/**
 * export resep API
 */
const exportResepAPI = (uuidOutlet) => {
  return `/ingredient/resep/export/${uuidOutlet}`;
};

/**
 * export resep API
 */
const importResepAPI = () => {
  return `/api/backoffice/ingredient/resep/import`;
};

export {
  getResepAPI,
  exportResepAPI,
  getResepByIdAPI,
  deleteResepAPI,
  saveResepAPI,
  updateResepAPI,
  importResepAPI,
};
