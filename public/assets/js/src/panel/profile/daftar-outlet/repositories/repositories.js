/**
 * get all daftar outlet API
 */
const getDaftarOutletAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: '/api/backoffice/profile/daftar-outlet/data',
        type: 'GET',
      },
      {
        isLoading: true,
        outlet: false,
      }
    );
    return response.data;
  } catch (e) {
    const { responseJSON } = e;
    const message = e instanceof ReferenceError ? error.message : responseJSON.message;
    swalError(message);
  }
};

/**
 * get daftar outlet by id API
 */
const getDaftarOutletByIdAPI = async (uuidOutlet) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/profile/daftar-outlet/get/${uuidOutlet}`,
        type: 'GET',
      },
      {
        isLoading: true,
        outlet: false,
      }
    );
    return response.data;
  } catch (error) {
    const { responseJSON } = e;
    const message = e instanceof ReferenceError ? error.message : responseJSON.message;
    swalError(message);
  }
};

/**
 * delete daftar outlet API
 */
const deleteDaftarOutletAPI = async (uuidOutlet) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/profile/daftar-outlet/delete/${uuidOutlet}`,
        type: 'DELETE',
      },
      {
        isLoading: true,
        outlet: false,
      }
    );
    return response;
  } catch (error) {
    const { responseJSON } = e;
    const message = e instanceof ReferenceError ? error.message : responseJSON.message;
    swalError(message);
  }
};

/**
 * save daftar outlet API
 */
const saveDaftarOutletAPI = () => {
  return '/api/backoffice/profile/daftar-outlet/save';
};

/**
 * update daftar outlet API
 */
const updateDaftarOutletAPI = (uuidOutlet) => {
  return `/api/backoffice/profile/daftar-outlet/update/${uuidOutlet}`;
};

export {
  getDaftarOutletAPI,
  getDaftarOutletByIdAPI,
  deleteDaftarOutletAPI,
  saveDaftarOutletAPI,
  updateDaftarOutletAPI,
};
