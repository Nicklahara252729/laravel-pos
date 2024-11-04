/**
 * get all data hak akses API
 */
const getHakAksesAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: '/api/backoffice/pegawai/akses/data',
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
      swalNotFound({ data: 'Hak Akses', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data hak akses by id API
 */
const getHakAksesByIdAPI = async (uuidAccess) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pegawai/akses/get/${uuidAccess}`,
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
 * delete data hak akses API
 */
const deleteHakAksesAPI = async (uuidAccess) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pegawai/akses/delete/${uuidAccess}`,
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
 * save data hak akses API
 */
const saveHakAksesAPI = () => {
  return '/api/backoffice/pegawai/akses/save';
};

/**
 * update data hak akses API
 */
const updateHakAksesAPI = (uuidAccess) => {
  return `/api/backoffice/pegawai/akses/update/${uuidAccess}`;
};

export {
  getHakAksesAPI,
  getHakAksesByIdAPI,
  deleteHakAksesAPI,
  saveHakAksesAPI,
  updateHakAksesAPI,
};
