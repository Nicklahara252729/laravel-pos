/**
 * static value
 */
let uuidOutlet = getDefaultOutletUuid();

/**
 * get all data riwayat transaksi API
 */
const getTotalRiwayatTransaksiAPI = async (url) => {
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
    if (e.status != 404) {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * listing data transaksi
 * @param {*} url
 * @returns
 */
const getRiwayatTransaksiAPI = async (url) => {
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
      page === 1 ? swalNotFound({ data: 'Riwayat Transaksi', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * search data
 * @param {*} url
 * @returns
 */
const searchRiwayatTransaksiAPI = async (url) => {
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
      page === 1 ? swalNotFound({ data: 'Riwayat Transaksi', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data riwayat transaksi by id API
 */
const getRiwayatTransaksByIdAPI = async (uuidTransaksi) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/riwayat-transaksi/get/${uuidTransaksi}/${uuidOutlet}`,
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
 * export transaksi API
 */
const exportTransaksiAPI = (uuidOutlet) => {
  return `/riwayat-transaksi/export/transaksi/${uuidOutlet}`;
};

/**
 * export item detail API
 */
const exportItemDetailAPI = (uuidOutlet) => {
  return `/riwayat-transaksi/export/item-detail/${uuidOutlet}`;
};

/**
 * store resend receipt API
 */
const resendReceiptAPI = () => {
  return '/api/backoffice/riwayat-transaksi/resend-receipt';
};

/**
 * store issue refund API
 */
const issueRefundAPI = () => {
  return '/api/backoffice/riwayat-transaksi/issue-refund';
};

/**
 * get item transaksi API
 */
const getItemAPI = async (uuidTransaksi) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/riwayat-transaksi/item/${uuidTransaksi}/${uuidOutlet}`,
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

export {
  getTotalRiwayatTransaksiAPI,
  getRiwayatTransaksiAPI,
  getRiwayatTransaksByIdAPI,
  searchRiwayatTransaksiAPI,
  exportTransaksiAPI,
  exportItemDetailAPI,
  resendReceiptAPI,
  issueRefundAPI,
  getItemAPI
};
