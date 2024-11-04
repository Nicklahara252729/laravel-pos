/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component table
 */
import { transactionItem } from '../table/transaction.js';

class ModalTransaction {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formImport;

    // defined component
    this.modalTransaction = $(`#${attributeName()[0]['modalTransaction']}`);
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
    this.modalTransactionList = $(`#${attributeName()[0]['modalTransactionList']}`);
  }

  /**
   * open transaction modal
   */
  modalOpenHandler(data) {
    const transaction_history_list = data
      .map((transaction) => transactionItem(transaction))
      .join(' ');

    this.modalTransaction.modal('show');
    $(`${this.modalDetail.selector} .modal-content`).addClass('dim');
    this.modalTransactionList.empty();
    this.modalTransactionList.append(transaction_history_list);
  }
}

export { ModalTransaction };
