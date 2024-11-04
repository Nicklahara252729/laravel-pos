/**
 * url status employeee
 */
const employeeStatus = {
  active: '/api/backoffice/pegawai/daftar-pegawai/data/active',
  inactive: '/api/backoffice/pegawai/daftar-pegawai/data/inactive',
};

/**
 * get all data daftar pegawai API
 */
const getDaftarPegawaiAPI = async (type) => {
  try {
    const response = await sendApiRequest(
      {
        url: employeeStatus[type],
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
      swalNotFound({ data: 'Pegawai', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data daftar pegawai by id API
 */
const getDaftarPegawaiByIdAPI = async (uuidUser) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pegawai/daftar-pegawai/get/${uuidUser}`,
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
 * nonactive data pegawai API
 */
const nonactiveDaftarPegawaiAPI = async (uuidUser) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pegawai/daftar-pegawai/delete/${uuidUser}`,
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
 * delete data daftar pegawai permanent API
 */
const deleteDaftarPegawaiAPI = async (uuidUser) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pegawai/daftar-pegawai/delete/permanent/${uuidUser}`,
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
 * store data daftar pegawai API
 */
const saveDaftarPegawaiAPI = () => {
  return '/api/backoffice/pegawai/daftar-pegawai/save';
};

/**
 * update data daftar pegawai API
 */
const updateDaftarPegawaiAPI = (uuidUser) => {
  return `/api/backoffice/pegawai/daftar-pegawai/update/${uuidUser}`;
};

/**
 * update pin akses pegawai API
 */
const updatePinAksesPegawaiAPI = (uuidUser) => {
  return `/api/backoffice/pegawai/pin-akses/update/${uuidUser}`;
};

/**
 * activate employee data API
 */
const activateDaftarPegawaiAPI = async (uuidUser) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pegawai/daftar-pegawai/restore/${uuidUser}`,
        type: 'PUT',
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
 * change password pegawai API
 */
const updatePasswordDaftarPegawaiAPI = (uuidUser) => {
  return `/api/backoffice/pegawai/daftar-pegawai/update/password/${uuidUser}`;
};

/**
 * update pin akses API
 */
const updatePinAksesAPI = (uuidUser) => {
  return `/api/backoffice/pegawai/pin-akses/update/${uuidUser}`;
};

/**
 * get pin akses by id API
 */
const getPinAksesByIdAPI = async (uuidUser) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pegawai/pin-akses/get/${uuidUser}`,
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
 * export daftar pegawai API
 */
const exportDaftarPegawaiAPI = (uuidOutlet) => {
  return `/pegawai/daftar-pegawai/export/${uuidOutlet}`;
};

/**
 * import daftar pegawai API
 */
const importDaftarPegawaiAPI = () => {
  return `/api/backoffice/pegawai/daftar-pegawai/import`;
};

export {
  getDaftarPegawaiAPI,
  getDaftarPegawaiByIdAPI,
  nonactiveDaftarPegawaiAPI,
  saveDaftarPegawaiAPI,
  updateDaftarPegawaiAPI,
  updatePinAksesPegawaiAPI,
  deleteDaftarPegawaiAPI,
  activateDaftarPegawaiAPI,
  updatePasswordDaftarPegawaiAPI,
  updatePinAksesAPI,
  getPinAksesByIdAPI,
  exportDaftarPegawaiAPI,
  importDaftarPegawaiAPI,
};
