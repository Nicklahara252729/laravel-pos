/**
 * import repositories
 */
import {
  exportInvoiceDetailAPI,
  exportInvoiceTransaksiAPI,
  updateInvoiceAPI,
  cancelInvoiceAPI,
  resendInvoiceAPI,
  getInvoiceByIdAPI,
} from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component modal
 */
import { ModalPayment } from '../components/modal/payment.js';
import { ModalCancel } from '../components/modal/cancel.js';

/**
 * import component item
 */
import { invoicePrint } from '../components/item/print.js';

/**
 * defined class
 */
const paymentModal = new ModalPayment();
const cancelModal = new ModalCancel();

/**
 * defined component
 */
const exportButton = $(`#${attributeName()[0]['exportButton']}`);
const resendButton = $(`#${attributeName()[0]['resendButton']}`);
const paymentButton = $(`#${attributeName()[0]['paymentButton']}`);
const moreContainer = $(`#${attributeName()[0]['moreContainer']}`);

/**
 * export handler
 */
const exportInvoiceHandler = () => {
  exportButton.on('click', `a`, function (event) {
    const action = $(this).data('action');
    const uuidOutlet = getDefaultOutletUuid();
    const exportProcess =
      action === 'transaksi'
        ? exportInvoiceTransaksiAPI(uuidOutlet)
        : exportInvoiceDetailAPI(uuidOutlet);
    window.open(exportProcess, '_blank');
  });
};

/**
 * resend modal handler
 */
const resendHandler = () => {
  resendButton.on('click', function (event) {
    const invoiceID = localStorage.getItem('alvaInvoiceID');
    const invoiceNumber = localStorage.getItem('alvaInvoiceNumber');
    const nama = `invoice ${invoiceNumber}`;
    const resendMessage = textConfirmResend(nama);
    swalConfirmation(
      {
        message: resendMessage,
        title: 'delete',
      },
      async () => {
        const resendProcess = await resendInvoiceAPI(invoiceID);
        if (resendProcess.status) {
          swalSuccess(resendProcess.message);
        }
      }
    );
  });
};

/**
 * payment modal handler
 */
const paymentHandler = async () => {
  paymentButton.on('click', () => {
    const invoiceID = localStorage.getItem('alvaInvoiceID');
    const param = {
      urlUpdate: updateInvoiceAPI(invoiceID),
      data: getInvoiceByIdAPI(invoiceID),
    };
    paymentModal.modalOpenHandler(param);
  });
};

/**
 * cancel modal handler
 */
const cancelHandler = (param) => {
  cancelModal.modalOpenHandler(param);
};

/**
 * print data handler
 */
const printHandler = (data) => {
  const printWindow = window.open('', '', 'width=800,height=600');
  printWindow.document.write('<html><head><title>Print Invoice</title></head><body>');
  printWindow.document.write(invoicePrint(data));
  printWindow.document.write('</body></html>');
  printWindow.document.close();
  printWindow.print();
};

/**
 * more action handler
 */
const moreActionHandler = async () => {
  moreContainer.on('click', 'a', async function (event) {
    const action = $(this).data('action');
    const invoiceID = localStorage.getItem('alvaInvoiceID');
    if (action === 'cancel') {
      const param = {
        urlCancel: cancelInvoiceAPI(invoiceID),
        data: await getInvoiceByIdAPI(invoiceID),
      };
      cancelHandler(param);
    } else {
      const data = [];
      printHandler(data);
    }
  });
};

/**
 * initialize
 */
const init = () => {
  exportInvoiceHandler();
  resendHandler();
  paymentHandler();
  moreActionHandler();
};

export { init };
