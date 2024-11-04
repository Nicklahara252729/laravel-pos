/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formAlasanPemenuhan } from '../form/alasan-pemenuhan.js';
// import { formUpdateProsesPesanan } from '../form/update-proses-pesanan.js';

class ModalAlasanPemenuhan {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formAlasanPemenuhan;
    // this.formManagerUpdateProsesPesanan = formUpdateProsesPesanan;

    // defined componnet
    this.modal = $(`#${attributeName()[0]['modalAlasanPemenuhan']}`);
    this.modalTitle = $(`#${attributeName()[0]['modalAlasanPemenuhan']} .modal-title`);
    this.modalDeskripsi = $(`#${attributeName()[0]['modalAlasanPemenuhan']} form p`);
    this.modalUpdate = $(`#${attributeName()[0]['modalUpdateProsesPesanan']}`);
  }

  /**
   * Handles modal behavior for import.
   */
  modalAlasanPemenuhanHandler(param) {
    let sisaPemenuhan = 0;
    let deskripsi = ``;
    let title = ``;

    param.data.pesanan.forEach((row) => {
      if (row.sisa > 0) {
        sisaPemenuhan++;
      }
    });

    if (sisaPemenuhan > 0) {
      $(`${this.modal.selector} form .form-group`).toggle(true);
      title = `Alasan Pemenuhan Sebagian`;
      deskripsi = `Kamu belum memenuhi semua pesanan kamu. Kamu dapat menambahkan catatan jika ada masalah dengan pesananmu.`;
    } else {
      $(`${this.modal.selector} form .form-group`).toggle(false);
      title = `Konfirmas Pemenuhan Pengiriman`;
      deskripsi = `Stok yang telah kamu terima akan ditambahkan ke Inventaris outlet mu, sementara stok yang rusak tidak akan memengaruhi Inventaris kamu.`;
    }
    this.modal.modal('show');
    $(`${this.modalUpdate.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalUpdate.selector} .modal-content`).removeClass('dim');
    });

    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);

    // jangan di hapus masih rancu
    // this.formManagerUpdateProsesPesanan.setMethod('PUT');
    // this.formManagerUpdateProsesPesanan.setAction(param.url);

    this.modalTitle.text(title);
    this.modalDeskripsi.text(deskripsi);
  }
}

export { ModalAlasanPemenuhan };
