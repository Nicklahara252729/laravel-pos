/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { detailElement, detailGratuityListElement } from '../item/detail.js';

class ModalDetail {
  /**
   * Creates a new instance of modal input.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
    this.detailGratuityList = $(`#${attributeName()[0]['detailGratuityList']}`);
  }

  /**
   * render gratuity
   */
  async renderGratuitites(getGratuities, uuidData = null) {
    const gratuityItems = gratuityInputItemElement(getGratuities, uuidData);
    this.gratuityList.empty();
    this.gratuityList.append(gratuityItems);
  }

  /**
   * open detail modal
   */
  modalDetailTipePenjualan(data) {
    this.modalDetail.modal('show');
    detailElement(data);
    const dataGratuity = data.gratuity;
    const gratuityList = dataGratuity
      .map((dataGratifikasi) => detailGratuityListElement(dataGratifikasi))
      .join('');
    this.detailGratuityList.empty();
    this.detailGratuityList.append(gratuityList);
  }
}

export { ModalDetail };
