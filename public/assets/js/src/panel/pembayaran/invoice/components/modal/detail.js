/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { detailEl } from '../item/detail.js';
import { productEl } from '../item/product.js';

/**
 * import component table
 */
import { riwayatPembayaranTable } from '../table/riwayat-pembayaran.js';

class ModalDetail {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.tableRiwayatPembayaran = $(`#${attributeName()[0]['tableRiwayatPembayaran']}`);
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
  }

  /**
   * Handles modal behavior for detail.
   *
   * @param {string} param - The unique identifier of the daftar produk to be edited.
   */
  async modalDetailHandler(param) {
    const data = param.data;

    /**
     * detail
     */
    const detailData = {
      status: data.status,
      tanggal: data.tanggal,
      tempo: data.tempo,
      invoice: data.no_invoice,
      customer: data.customer,
      diskon: data.product.diskon,
      subtotal: data.product.subtotal,
      gratuity: data.product.gratuity,
      tax: data.product.tax,
      total: data.product.total,
      catatan: data.catatan,
    };
    detailEl(detailData);

    /**
     * riwayat pembayaran
     */
    $(`${this.tableRiwayatPembayaran.selector} tbody`).empty();
    riwayatPembayaranTable(data.history_payment);

    /**
     * product item
     */
    productEl(data.product.item);

    this.modalDetail.modal('show');
  }
}

export { ModalDetail };
