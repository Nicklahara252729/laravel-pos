/**
 * get akun by id API
 */
const getAkunById = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/profile/akun/get`,
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
 * change password akun API
 */
const updatePasswordAPI = () => {
  return `/api/backoffice/profile/akun/ubah-password`;
};

/**
 * update akun API
 */
const updateAkunAPI = () => {
  return `/api/backoffice/profile/akun/update`;
};

/**
 * contact verification API
 */
const contactVerificationAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/profile/akun/contact-verification`,
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
 * email verification API
 */
const emailVerificationAPI = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/profile/akun/email-verification`,
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
 * verify contact
 */
const verifyContactAPI = () => {
  return `/api/backoffice/profile/akun/verify-contact`;
};

export {
  getAkunById,
  updatePasswordAPI,
  updateAkunAPI,
  contactVerificationAPI,
  emailVerificationAPI,
  verifyContactAPI
};
