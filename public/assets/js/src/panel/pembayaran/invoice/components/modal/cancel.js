/**
 * import component form
 */
import { formCancel } from '../form/cancel.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { itemElement } from '../item/product.js';

/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

class ModalCancel {
  /**
   * Creates a new instance of modal cancel.
   *
   * @constructor
   */
  constructor() {
    this.formManager = formCancel;
    this.modal = $(`#${attributeName()[0]['modalCancel']}`);
    this.itemRefund = $(`#${attributeName()[0]['itemRefund']}`);
    this.reason = $(`#${attributeName()[0]['reason']}`);
    this.alasanLainnya = $(`#${attributeName()[0]['alasanLainnya']}`);
    this.totalRefund = $(`#${attributeName()[0]['totalRefund']}`);
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
  }

  /**
   * load item
   */
  async loadItem(data) {
    this.itemRefund.empty();
    const itemRender = itemElement(data);
    this.itemRefund.append(itemRender);
  }

  /**
   * render reason
   */
  renderReason() {
    this.reason.on('change', function () {
      const reason = $(this).val();
      this.alasanLainnya.empty();
      if (reason === 'lainnya') {
        this.alasanLainnya.append(
          `<textarea class="form-control" id="reason_other" name="reason_other" placeholder='Masukkan alasan lainnya'></textarea>`
        );
      }
    });
  }

  /**
   * Handles modal behavior for cancel.
   */
  async modalOpenHandler(param) {
    const data = param.data;
    this.loadItem(data.product.item);
    this.renderReason();
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.urlCancel);
    this.totalRefund.text(`Rp ${formatCurrency(data.product.total)}`);
    this.modal.modal('show');
    $(`${this.modalDetail.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalDetail.selector} .modal-content`).removeClass('dim');
    });
  }
}

export { ModalCancel };
