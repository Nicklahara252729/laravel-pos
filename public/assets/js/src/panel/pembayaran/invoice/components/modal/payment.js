/**
 * import component form
 */
import { formPayment } from '../form/payment.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component table
 */
import { riwayatPembayaranTable } from '../table/riwayat-pembayaran.js';

/**
 * import helper
 */
import { formatCurrency, convertDate } from '../../../../../../helpers/converter.js';

class ModalPayment {
  /**
   * Creates a new instance of modal payment.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formPayment;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalPayment']}`);
    this.tipePembayaranContainer = $(`#${attributeName()[0]['tipePembayaranContainer']}`);
    this.tipePembayaranLainnyaContainer = $(
      `#${attributeName()[0]['tipePembayaranLainnyaContainer']}`
    );
    this.previewPaymentInvoiceButton = $(`#${attributeName()[0]['previewPaymentInvoiceButton']}`);
    this.detailButtonContainer = $(`.${attributeName()[0]['detailButtonContainer']}`);
    this.submitPaymentInvoiceButton = $(`#${attributeName()[0]['submitPaymentInvoiceButton']}`);
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
    this.totalTagihan = $(`#${attributeName()[0]['totalTagihan']}`);
  }

  /**
   * render sales type
   */
  renderSalesType = () => {
    $(`${this.tipePembayaranContainer.selector} :input`).on('change', function () {
      const action = $(this).data('action');
      this.tipePembayaranLainnyaContainer.empty();
      if (action === 'lainnya') {
        this.tipePembayaranLainnyaContainer.toggle(true);
        this.tipePembayaranLainnyaContainer.append(
          `<input type="text" class="form-control" name="tipe_pembayaran" placeholder="Masukkan tipe pembayaran">`
        );
      } else {
        this.tipePembayaranLainnyaContainer.toggle(false);
      }
    });
  };

  /**
   * payment preview
   */
  paymentPreview = (total) => {
    this.previewPaymentInvoiceButton.on('click', () => {
      const data = this.formManager.paymentPreview(total);
      const sisaTunggakan = total - data.jumlah;
      const tableData = [
        {
          paid: data.jumlah,
          date: convertDate(data.tanggal),
          left: sisaTunggakan,
        },
      ];
      riwayatPembayaranTable(tableData);
      this.detailButtonContainer.toggle(false);
      this.submitPaymentInvoiceButton.removeClass('d-none');
      this.modal.modal('hide');
    });
  };

  /**
   * Handles modal behavior for import.
   */
  async modalOpenHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.urlUpdate);
    this.formManager.emptyForm();
    const data = await param.data;
    const total = data.product.total;
    this.modal.modal('show');
    $(`${this.modalDetail.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalDetail.selector} .modal-content`).removeClass('dim');
    });
    this.totalTagihan.text(`Rp ${formatCurrency(total)}`);
    this.renderSalesType();
    this.paymentPreview(total);
  }
}

export { ModalPayment };
