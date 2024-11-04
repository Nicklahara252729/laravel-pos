/**
 * get all data PO API
 */
const getPOAPI = async (url) => {
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
      swalNotFound({ data: 'PO', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data PO by id API
 */
const getPOByIdAPI = async (uuidPo) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/inventory/purchasing-order/get/${uuidPo}`,
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
 * riwayat data PO API
 */
const riwayatPOByIdAPI = async (uuidPo) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/inventory/purchasing-order/riwayat/${uuidPo}`,
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
 * store data PO API
 */
const savePOAPI = () => {
  return `/api/backoffice/inventory/purchasing-order/save`;
};

/**
 * update data PO API
 */
const updatePOAPI = (uuidPo) => {
  return `/api/backoffice/inventory/purchasing-order/update/${uuidPo}`;
};

/**
 * reject data PO API
 */
const rejectPOAPI = (uuidPo) => {
  return `/api/backoffice/inventory/purchasing-order/reject/${uuidPo}`;
};

/**
 * export PO API
 */
const exportPOAPI = (uuidOutlet) => {
  return `/inventory/purchasing-order/export/${uuidOutlet}`;
};

/**
 * export PO API
 */
const importPOAPI = () => {
  return `/api/backoffice/inventory/purchasing-order/import`;
};

/**
 * update proses pesanan API
 */
const updateProsesPesananAPI = (uuidPo) => {
  return `/api/backoffice/inventory/purchasing-order/update-proses-pesanan/${uuidPo}`;
};

/**
 * hentikan pemenuhan API
 */
const hentikanPemenuhanAPI = (uuidPo) => {
  return `/api/backoffice/inventory/purchasing-order/hentikan-pemenuhan/${uuidPo}`;
};

export {
  getPOAPI,
  exportPOAPI,
  getPOByIdAPI,
  rejectPOAPI,
  savePOAPI,
  updatePOAPI,
  importPOAPI,
  riwayatPOByIdAPI,
  updateProsesPesananAPI,
  hentikanPemenuhanAPI,
};
