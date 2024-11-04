/**
 * get all data invoice API
 */
const getInvoiceAPI = async (url) => {
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
      page === 1 ? swalNotFound({ data: 'Invoice', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get invoice by id API
 */
const getInvoiceByIdAPI = async (uuidItem) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pembayaran/invoice/get/${uuidItem}`,
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
 * update invoice API
 */
const updateInvoiceAPI = (uuidTransaksi) => {
  return `/api/backoffice/pembayaran/invoice/update/${uuidTransaksi}`;
};

/**
 * resend invoice API
 */
const resendInvoiceAPI = async (uuidInvoice) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pembayaran/invoice/resend/${uuidInvoice}`,
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
 * cancel invoice API
 */
const cancelInvoiceAPI = (uuidInvoice) => {
  return `/api/backoffice/pembayaran/invoice/cancel/${uuidInvoice}`;
};

/**
 * export transaksi invoice API
 */
const exportInvoiceTransaksiAPI = (uuidInvoice) => {
  return `/pembayaran/invoice/export/transaksi/${uuidInvoice}`;
};

/**
 * export detail invoice API
 */
const exportInvoiceDetailAPI = (uuidInvoice) => {
  return `/pembayaran/invoice/export/detail/${uuidInvoice}`;
};

export {
  getInvoiceAPI,
  getInvoiceByIdAPI,
  updateInvoiceAPI,
  resendInvoiceAPI,
  cancelInvoiceAPI,
  exportInvoiceTransaksiAPI,
  exportInvoiceDetailAPI,
};
