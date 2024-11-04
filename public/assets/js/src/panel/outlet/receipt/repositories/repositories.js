/**
 * get preview API
 */
const previewReceiptAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/outlet/receipt/preview`,
        type: 'GET',
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
 * update receipt API
 */
const updateReceiptAPI = () => {
  return `/api/backoffice/outlet/receipt/update`;
};

export {
  previewReceiptAPI,
  updateReceiptAPI,
};
