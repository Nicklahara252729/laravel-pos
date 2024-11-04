/**
 * Sets authorization headers in the provided options object.
 *
 * @param {Object} options - The options object to which headers will be added.
 */
const setAuthorizationHeader = (options, outletAttribute) => {
  let outletHeader;
  if (outletAttribute == true) {
    outletHeader =
      getUserAttribute('alvaPosLevel') == 'owner' ||
      (getUserAttribute('alvaPosLevel') == 'superadmin' && getDefaultOutletUuid() !== null)
        ? { outlet: getDefaultOutletUuid() }
        : {};
  }
  const headers = options.headers || {};
  options.headers = {
    ...headers,
    ...outletHeader,
    Authorization: `Bearer ${getAccessToken()}`,
  };
};

let accessTokenRefreshed = false; // Tandai apakah access token telah diperbarui

/**
 * Handles unauthenticated errors by refreshing the access token and reattempting the API request.
 *
 * @param {Object} options - The options object containing the API request configuration.
 * @returns {Promise} A Promise that resolves with the API response after handling unauthenticated errors.
 */
const handleUnauthenticatedError = async (options) => {
  const newAccessToken = await refreshAccessToken();
  setAccessToken(newAccessToken.data.token);
  const newOptions = { ...options };
  setAuthorizationHeader(newOptions);
  return $.ajax(newOptions); // Return the AJAX request after updating the access token
};

/**
 * Sends an API request with optional authorization
 *
 * @param {Object} options - The options object containing the API request configuration.
 * @param {boolean} authorize - Indicates whether the request needs authorization headers.
 * @returns {Promise} A Promise that resolves with the API response.
 * @throws Will throw an error if the API request fails.
 */
const sendApiRequest = async (options, attribute) => {
  try {
    const isLoading = attribute.isLoading;
    const outletAttribute = attribute.outlet;
    const { type } = options;
    let newOptions =
      type.toUpperCase() === 'POST' || type.toUpperCase() === 'PUT'
        ? { ...options, processData: false, contentType: false }
        : { ...options };
    isLoading === true ? showLoadingModal() : null;
    setAuthorizationHeader(newOptions, outletAttribute);

    const response = await $.ajax(newOptions);
    isLoading === true ? swal.close() : null;
    return response;
  } catch (error) {
    const { responseJSON } = error;
    if (error.status === 401 && responseJSON?.message === 'Unauthenticated.') {
      if (!accessTokenRefreshed) {
        handleUnauthenticatedError(options);
        accessTokenRefreshed = true; // Tandai bahwa access token telah diperbarui
      }
    } else {
      throw error;
    }
  }
};
