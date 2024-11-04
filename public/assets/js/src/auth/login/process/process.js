/**
 * import component
 */
import { showAlert } from '../components/alert/alert.js';
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * form submit
 */
const formSubmit = () => {
  const formLogin = $(`#${attributeName()[0]['formLogin']}`);
  $(formLogin).on('submit', async () => {
    event.preventDefault();
    const formData = new FormData(formLogin[0]);
    try {

      /**
       * login process api
       */
      const loginResponse = await sendApiRequest(
        {
          url: '/api/auth/login',
          type: 'POST',
          data: formData
        },
        {
          isLoading: false,
          outlet: false
        }
      );

      setAccessToken(loginResponse.data.token);

      /**
       * get detail user process api
       */
      const getUser = await sendApiRequest(
        {
          url: '/api/token/validation',
          type: 'GET',
        },
        {
          
          isLoading: false,
          outlet: false
        }
      );
      setUserAttribute(getUser.data);
      showAlert('Login sukses!', 'alert-success');
      $(formLogin).off('submit').submit();
    } catch (error) {
      showAlert(
        'Email yang anda masukkan tidak terdaftar, periksa kembali email anda!',
        'alert-warning'
      );
      const { responseJSON } = error;
      const message = error instanceof ReferenceError ? error.message : responseJSON.message;
      console.error('Error:', message);
    }
  });
};

/**
 * form submit
 */
const init = () => {
  formSubmit();
};

export { init };
