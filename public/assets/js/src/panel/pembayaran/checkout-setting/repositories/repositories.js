/**
 * get checkout setting data API
 */
const getCheckoutSettingAPI = async (uuidOutlet) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/pembayaran/checkout-setting/get/${uuidOutlet}`,
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
      swalNotFound({ data: 'Tipe Penjualan', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * update data tipe penjualan API
 */
const updateCheckoutSettingAPI = (uuidOutlet) => {
  return `/api/backoffice/pembayaran/checkout-setting/update/${uuidOutlet}`;
};

export { getCheckoutSettingAPI, updateCheckoutSettingAPI };
