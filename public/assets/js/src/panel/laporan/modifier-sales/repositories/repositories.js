/**
 * url modifier sales
 */
const urlModifierSales = {
  false: `/api/backoffice/laporan/modifier-sales/data`,
  true: `/api/backoffice/laporan/modifier-sales/data?date=${getValueFromLocalStorage()}`,
};

/**
 * get all data modifier sales API
 */
const getModifierSalesAPI = async (url) => {
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
      swalNotFound({ data: 'Modifier Sales', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * export modifier sales API
 */
const exportModifierSalesAPI = (uuidOutlet) => {
  return `/laporan/modifier-sales/export/${uuidOutlet}`;
};

export { getModifierSalesAPI, exportModifierSalesAPI };
