/**
 * import helper
 */
import { FormManager } from '../../../../../../helpers/FormManager.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

class FormVerifikasiKontak extends FormManager {
  constructor(form, modal, submitButton) {
    super(form, modal, submitButton);
  }

  /**
   * handling if success
   * @param {*} response
   */
  handleSuccessResponse = async (response) => {
    swalSuccess(response.message, async () => {
      this.modal.modal('hide');
      window.location.reload();
    });
  };

  /**
   * set for post data
   * @returns
   */
  getPostData = () => {
    const formData = this.getFormData();
    return formData;
  };

  /**
   * set for put data
   * @returns
   */
  getPutData = () => {
    const formData = this.getPostData();
    formData.append('_method', 'PUT');
    return formData;
  };

  /**
   * initialize form
   */
  initForm = () => {
    this.submitButton.off('click').on('click', () => {
      this.form.submit();
    });

    this.form.off('submit').on('submit', (e) => {
      e.preventDefault();
      this.submitForm(false);
    });
  };
}

const formverifikasiKontak = new FormVerifikasiKontak(
  $(`#${attributeName()[0]['formVerifikasiKontak']}`),
  $(`#${attributeName()[0]['modalVerifikasiKontak']}`),
  $(`#${attributeName()[0]['submitVerifikasiKontakButton']}`)
);
export { formverifikasiKontak };
