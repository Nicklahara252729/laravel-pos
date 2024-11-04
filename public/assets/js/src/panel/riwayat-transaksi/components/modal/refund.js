/**
 * import component form
 */
import { formIssueRefund } from '../form/refund.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { itemElement } from '../item/item.js';

class ModalIssueRefund {
  /**
   * Creates a new instance of modalIssueRefund.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formIssueRefund;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalIssueRefund']}`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitindeIssueRefundButton']}`);
    this.itemRefund = $(`#${attributeName()[0]['itemRefund']}`);
    this.otherReason = $(`#${attributeName()[0]['alasanLainnya']}`);
    this.reason = $(`#${attributeName()[0]['reason']}`);
    this.modalReceipt = $(`#${attributeName()[0]['modalReceipt']}`);
  }

  /**
   * load item
   */
  async loadItem(item) {
    const data = typeof item == 'undefined' ? [] : item;
    this.itemRefund.empty();
    const itemRender = data.map((datas) => itemElement(datas)).join('');
    this.itemRefund.append(itemRender);
  }

  /**
   * render reason
   */
  renderReason() {
    this.reason.on('change', function () {
      const reason = $(this).val();
      this.otherReason.empty();
      if (reason === 'lainnya') {
        this.otherReason.append(
          `<textarea class="form-control" id="reason_other" name="reason_other" placeholder='Masukkan alasan lainnya'></textarea>`
        );
      }
    });
  }

  /**
   * Handles modal behavior for adding a new daftar pegawai.
   */
  async modalIssueRefundHandler(param) {
    this.loadItem(param.item);
    this.renderReason();
    this.modal.modal('show');
    $(`${this.modalReceipt.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalReceipt.selector} .modal-content`).removeClass('dim');
    });
    this.formManager.setMethod('POST');
    this.formManager.setAction(param.url);
    this.formManager.emptyForm();
  }
}

export { ModalIssueRefund };
