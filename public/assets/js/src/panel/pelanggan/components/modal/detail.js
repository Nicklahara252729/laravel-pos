/**
 * import component table
 */
import { transactionItem } from '../table/transaction.js';

/**
 * import helper
 */
import { formatCurrency } from '../../../../../helpers/converter.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

class ModalDetail {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.transactionList = $(`#${attributeName()[0]['transactionList']}`);
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
    this.name = `${attributeName()[0]['name']}`;
    this.contact = `${attributeName()[0]['contact']}`;
    this.email = `${attributeName()[0]['email']}`;
    this.birthDate = `${attributeName()[0]['birthDate']}`;
    this.gender = `${attributeName()[0]['gender']}`;
    this.transactionCount = `${attributeName()[0]['transactionCount']}`;
    this.joinDate = `${attributeName()[0]['joinDate']}`;
    this.lastTransaction = `${attributeName()[0]['lastTransaction']}`;
    this.monthTransaction = `${attributeName()[0]['monthTransaction']}`;
    this.yearTransaction = `${attributeName()[0]['yearTransaction']}`;
    this.totalTransaction = `${attributeName()[0]['totalTransaction']}`;
    this.averageTransaction = `${attributeName()[0]['averageTransaction']}`;
  }

  /**
   * render detail modal
   */
  renderDetailModa(data) {
    const { nama, kontak, email, tgl_lahir, gender } = data.profil;
    const {
      jumlah_transaksi,
      terdaftar,
      transaksi_terakhir,
      month_transaction,
      year_transaction,
      total_transaction,
      average_transaction,
    } = data.sorotan;

    const transaction_history = data.riwayat_transaksi;

    document.getElementById(this.name).textContent = nama;
    document.getElementById(this.contact).textContent = kontak;
    document.getElementById(this.email).textContent = email;
    document.getElementById(this.birthDate).textContent = tgl_lahir;
    document.getElementById(this.gender).textContent = gender;

    // Update customer highlight section
    document.getElementById(this.transactionCount).textContent = jumlah_transaksi;
    document.getElementById(this.joinDate).textContent = terdaftar;
    document.getElementById(this.lastTransaction).textContent = transaksi_terakhir;
    document.getElementById(this.monthTransaction).textContent = formatCurrency(month_transaction);
    document.getElementById(this.yearTransaction).textContent = formatCurrency(year_transaction);
    document.getElementById(this.totalTransaction).textContent = formatCurrency(total_transaction);
    document.getElementById(this.averageTransaction).textContent =
      formatCurrency(average_transaction);

    const transaction_history_list = transaction_history
      .map((transaction) => transactionItem(transaction))
      .join(' ');

    this.transactionList.empty();
    this.transactionList.append(transaction_history_list);
  }

  /**
   * open detail modal
   */
  detailModal(data, uuidPelanggan) {
    renderDetailModal(data);
    this.modalDetail.modal('show');
  }
}

export { ModalDetail };
