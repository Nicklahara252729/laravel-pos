/**
 * get pengaturan API
 */
const getPengaturanAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/profile/pengaturan/get`,
        type: 'GET',
      },
      {
        isLoading: true,
        outlet: false,
      }
    );
    return response.data;
  } catch (error) {
    const { responseJSON } = e;
    const message = e instanceof ReferenceError ? error.message : responseJSON.message;
    swalError(message);
  }
};

/**
 * update sistem API
 */
const updateSistemAPI = () => {
  return `/api/backoffice/profile/pengaturan/update/sistem`;
};

/**
 * update info bisnis API
 */
const updateInfoBisnisAPI = () => {
  return `/api/backoffice/profile/pengaturan/update/info-bisnis`;
};

/**
 * update npwp API
 */
const updateNpwpAPI = () => {
  return `/api/backoffice/profile/pengaturan/update/npwp`;
};

export { getPengaturanAPI, updateSistemAPI, updateInfoBisnisAPI, updateNpwpAPI };
