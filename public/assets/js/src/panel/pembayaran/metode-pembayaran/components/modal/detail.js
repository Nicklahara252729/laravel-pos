/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { detailElement, outletElement, paymentElement } from '../item/detail.js';

class ModalDetail {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.detailOutletList = $(`#${attributeName()[0]['detailOutletList']}`);
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
    this.detailPaymentList = $(`#${attributeName()[0]['detailPaymentList']}`);
  }

  /**
   * open detail modal
   */
  modalDetailMetodePembayaran(param) {
    const data = param.data;
    this.modalDetail.modal('show');
    detailElement(data);

    const outlet = typeof data == 'undefined' ? [] : data.outlet;
    this.detailOutletList.empty();
    const outletHandler = outlet.map((outlets) => outletElement(outlets)).join('');
    this.detailOutletList.append(outletHandler);

    const payment = typeof data == 'undefined' ? [] : data.payment;
    this.detailPaymentList.empty();
    const paymentHandler = payment.map((payments) => paymentElement(payments)).join('');
    this.detailPaymentList.append(paymentHandler);
  }
}

export { ModalDetail };
