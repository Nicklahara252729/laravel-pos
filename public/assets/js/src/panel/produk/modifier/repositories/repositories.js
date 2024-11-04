/**
 * modifier
 * get all data modifier API
 */
const getModifierAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: '/api/backoffice/produk/modifier/data',
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
      swalNotFound({ data: 'Modifier', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data modifier by id API
 */
const getModifierByIdAPI = async (uuidModifier) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/modifier/get/${uuidModifier}`,
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
 * delete modifier API
 */
const deleteModifierAPI = async (uuidModifier) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/modifier/delete/${uuidModifier}`,
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
 * save modifier API
 */
const saveModifierAPI = () => {
  return `/api/backoffice/produk/modifier/save`;
};

/**
 * update modifier API
 */
const updateModifierAPI = (uuidModifier) => {
  return `/api/backoffice/produk/modifier/update/${uuidModifier}`;
};

/**
 * modifier assign item
 * get all data modifier assign item API
 */
const getModifierAssignItemAPI = async (uuidModifier) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/modifier/item/data/${uuidModifier}`,
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
      swalNotFound({ data: 'Modifier Assign Item', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data modifier assign item by id API
 */
const getModifierAssignItemByIdAPI = async (uuidModifierAssignItem) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/modifier/item/get/${uuidModifierAssignItem}`,
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
 * delete modifier assign item API
 */
const deleteModifierAssignItemAPI = async (uuidModifierAssignItem) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/modifier/item/delete/${uuidModifierAssignItem}`,
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
 * save modifier assign item API
 */
const saveModifierAssignItemAPI = () => {
  return `/api/backoffice/produk/modifier/item/save`;
};

/**
 * update modifier assign API
 */
const updateModifierAssignItemAPI = (uuidModifierAssignItem) => {
  return `/api/backoffice/produk/modifier/item/update/${uuidModifierAssignItem}`;
};

/**
 * modifier assign ingredient
 * get all data modifier API
 */
const getModifierAssignIngredientAPI = async (uuidModifier) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/modifier/ingredient/data/${uuidModifier}`,
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
      swalNotFound({ data: 'Modifier', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data modifier assign ingredient by id API
 */
const getModifierAssignIngredientByIdAPI = async (uuidModifierAssignIngredient) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/modifier/ingredient/get/${uuidModifierAssignIngredient}`,
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
 * delete modifier assign ingredient API
 */
const deleteModifierAssignIngredientAPI = async (uuidModifierAssignIngredient) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/modifier/ingredient/delete/${uuidModifierAssignIngredient}`,
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
 * save modifier assign ingredient API
 */
const saveModifierAssignIngredientAPI = () => {
  return `/api/backoffice/produk/modifier/ingredient/save`;
};

/**
 * update modifier assign ingredient API
 */
const updateModifierAssignIngredientAPI = (uuidModifierAssignIngredient) => {
  return `/api/backoffice/produk/modifier/ingredient/update/${uuidModifierAssignIngredient}`;
};

export {
  getModifierAPI,
  getModifierByIdAPI,
  deleteModifierAPI,
  saveModifierAPI,
  updateModifierAPI,
  getModifierAssignItemAPI,
  getModifierAssignItemByIdAPI,
  deleteModifierAssignItemAPI,
  saveModifierAssignItemAPI,
  updateModifierAssignItemAPI,
  getModifierAssignIngredientAPI,
  getModifierAssignIngredientByIdAPI,
  deleteModifierAssignIngredientAPI,
  saveModifierAssignIngredientAPI,
  updateModifierAssignIngredientAPI,
};
