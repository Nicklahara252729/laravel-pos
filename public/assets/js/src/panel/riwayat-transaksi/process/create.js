/**
 * import repositories
 */
import {
  exportTransaksiAPI,
  exportItemDetailAPI,
  resendReceiptAPI,
  issueRefundAPI,
  getItemAPI,
} from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component modal
 */
import { ModalResendReceipt } from '../components/modal/resend.js';
import { ModalIssueRefund } from '../components/modal/refund.js';

/**
 * defined component
 */
const exportTransaksiButton = $(`#${attributeName()[0]['exportTransaksiButton']}`);
const exportItemDetailButton = $(`#${attributeName()[0]['exportItemDetailButton']}`);
const resendButton = $(`#${attributeName()[0]['resendButton']}`);
const refundButton = $(`#${attributeName()[0]['refundButton']}`);

/**
 * defined class
 */
const resendReceiptModal = new ModalResendReceipt();
const issueRefundModal = new ModalIssueRefund();

/**
 * export transaksi handler
 */
const exportTransaksiHanlder = () => {
  exportTransaksiButton.on('click', () => {
    const uuidOutlet = getDefaultOutletUuid();
    const exportProcess = exportTransaksiAPI(uuidOutlet);
    window.open(exportProcess, '_blank');
  });
};

/**
 * export laporan perjam terjual handler
 */
const exportItemDetailHandler = () => {
  exportItemDetailButton.on('click', () => {
    const uuidOutlet = getDefaultOutletUuid();
    const exportProcess = exportItemDetailAPI(uuidOutlet);
    window.open(exportProcess, '_blank');
  });
};

/**
 * resend receipt handler
 */
const resendReceiptHandler = () => {
  resendButton.on('click', () => {
    resendReceiptModal.modalResendReceiptHandler(resendReceiptAPI());
  });
};

/**
 * issue refund handler
 */
const issueRefundHandler = () => {
  refundButton.on('click', async () => {
    const uuidTransaksi = JSON.parse(localStorage.getItem('uuidTransaksi'));
    const param = { item: await getItemAPI(uuidTransaksi), url: issueRefundAPI() };
    issueRefundModal.modalIssueRefundHandler(param);
  });
};

/**
 * Initializes event listener
 */
const init = () => {
  exportTransaksiHanlder();
  exportItemDetailHandler();
  resendReceiptHandler();
  issueRefundHandler();
};

export { init };
