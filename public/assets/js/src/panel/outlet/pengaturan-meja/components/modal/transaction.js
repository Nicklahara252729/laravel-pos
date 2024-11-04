/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { doneTransaction, paymentMethod, cancelReservation } from '../item/transaction.js';
import { productItem } from '../item/product.js';

class ModalTransaction {
  /**
   * Creates a new instance of modal transaction.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modal = $(`#${attributeName()[0]['modalTransaksi']}`);
    this.biayaContainer = $(`#${attributeName()[0]['biayaContainer']}`);
    this.tanggalReservasiContainer = $(`#${attributeName()[0]['tanggalReservasiContainer']}`);
    this.reservasiContainer = $(`#${attributeName()[0]['reservasiContainer']}`);
  }

  /**
   * Handles modal behavior for adding a new daftar pegawai.
   */
  async modalOpenHandler(data) {
    $(`${this.modal.selector}`).modal('show');
    const status = data.status;

    /**
     * detail
     */
    let detailData = {
      status: data.status,
      no_struck: data.no_struck,
      meja: data.meja,
      jumlah_kursi: data.jumlah_kursi,
      diskon: data.product.diskon,
      subtotal: data.product.subtotal,
      gratuity: data.product.gratuity,
      tax: data.product.tax,
      total: data.product.total,
      charge: data.product.charge,
      catatan: data.catatan,
    };
    if (status === 'selesai' || status === 'reservasi') {
      this.biayaContainer.toggle(true);
      if (status === 'reservasi') {
        const tanggalReservasiEl = `<div class="font-medium">Tanggal Reservasi</div>
                        <div id="transaksi-tanggal-reservasi"></div>`;
        this.tanggalReservasiContainer.empty();
        this.tanggalReservasiContainer.append(tanggalReservasiEl);
        detailData = { ...detailData, tanggal_reservasi: data.tanggal_reservasi };
      }
    } else {
      this.biayaContainer.toggle(false);
    }
    doneTransaction(detailData);

    /**
     * payment method
     */
    if (status === 'selesai' || status === 'reservasi') {
      const dataPaymentMethod = {
        method: data.product.payment_method.method,
        payment: data.product.payment_method.amount,
      };
      paymentMethod(dataPaymentMethod);
    }

    /**
     * cancel reservation
     */
    if (status === 'dibatalkan') {
      this.reservasiContainer.toggle(true);
      const cancelData = {
        reservasi: data.reservasi,
        refund: data.refund,
      };
      cancelReservation(cancelData);
    } else {
      this.reservasiContainer.toggle(false);
    }

    /**
     * product item
     */
    productItem(data.product.item);
  }
}

export { ModalTransaction };
