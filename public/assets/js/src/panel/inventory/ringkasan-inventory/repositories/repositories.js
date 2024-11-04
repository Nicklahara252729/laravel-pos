/**
 * get all data ringkasan inventory API
 */
const getRingkasanInventoryAPI = async (url) => {
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
      page === 1 ? swalNotFound({ data: 'Ringkasan Inventory', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * export API
 */
const exportAPI = (uuidOutlet) => {
  return `/inventory/ringkasan-inventory/export/${uuidOutlet}`;
};

export { getRingkasanInventoryAPI, exportAPI };
