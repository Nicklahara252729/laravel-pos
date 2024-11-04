/**
 * static variable
 */
let alvaPosAccessToken = '';
let alvaPosLevel = '';

/**
 * get access token
 */
const getAccessToken = () => {
  return Cookies.get('alvaPosAccessToken');
};

/**
 * get user attribute
 */
const getUserAttribute = (attribute) => {
  return Cookies.get(attribute);
};

/**
 * set access token
 */
const setAccessToken = (token) => {
  Cookies.set('alvaPosAccessToken', token, { expires: 1 }); // Set cookie expiration as desired
  alvaPosAccessToken = token;
};

/**
 * set user attribute
 */
const setUserAttribute = (attribute) => {
  Cookies.set('alvaPosLevel', attribute.level, { expires: 1 });
  alvaPosLevel = attribute.level;
};

/**
 * remove access token
 */
const removeCookies = () => {
  Cookies.remove('alvaPosAccessToken');
  Cookies.remove('alvaPosLevel');
  alvaPosAccessToken = '';
  alvaPosLevel = '';
};

/**
 * refresh access token
 */
const refreshAccessToken = async () => {
  try {
    const option = {
      url: '/api/token/refresh',
      type: 'POST',
      headers: {
        'Content-Type': 'application/json',
        Authorization: `Bearer ${getAccessToken()}`,
      },
    };

    const response = await $.ajax(option);
    if (response.status === 'OK') {
      const newAccessToken = response;
      return newAccessToken;
    } else {
      throw new Error('Failed to refresh access token');
    }
  } catch (error) {
    throw error;
  }
};

/**
 * show loading modal
 */
const showLoadingModal = () => {
  swal({
    title: 'Loading...',
    text: 'Please wait',
    buttons: false,
    closeOnClickOutside: false,
    closeOnEsc: false,
    allowOutsideClick: false,
    onBeforeOpen: () => {
      swal.showLoading();
    },
  });
};
