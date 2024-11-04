/**
 * get all listing payment API
 */
const getPaymentListAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pembayaran/metode-pembayaran/payment-list`,
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
      page === 1 ? swalNotFound({ data: 'Daftar Payment', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

const getMetodePembayaranAPI = async (page) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pembayaran/metode-pembayaran/data?page=${page}`,
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
      page === 1 ? swalNotFound({ data: 'Metode Pembayaran', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data metode pembayaran by id API
 */
const getMetodePembayaranByIdAPI = async (uuidPaymentConfiguration) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pembayaran/metode-pembayaran/get/${uuidPaymentConfiguration}`,
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
 * delete data metode pembayaran API
 */
const deleteMetodePembayaranAPI = async (uuidPaymentConfiguration) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pembayaran/metode-pembayaran/delete/${uuidPaymentConfiguration}`,
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
 * update data metode pembayaran API
 */
const updateMetodePembayaranAPI = (uuidPaymentConfiguration) => {
  return `/api/backoffice/pembayaran/metode-pembayaran/update/${uuidPaymentConfiguration}`;
};

/**
 * store data metode pembayaran API
 */
const saveMetodePembayaranAPI = () => {
  return `/api/backoffice/pembayaran/metode-pembayaran/save`;
};

export {
  getPaymentListAPI,
  getMetodePembayaranAPI,
  getMetodePembayaranByIdAPI,
  deleteMetodePembayaranAPI,
  updateMetodePembayaranAPI,
  saveMetodePembayaranAPI,
};
