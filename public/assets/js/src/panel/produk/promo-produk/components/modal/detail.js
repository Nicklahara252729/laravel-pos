/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import {
  detailElement,
  detailOutletElement,
  detailItemElemet,
  detailHppElement,
} from '../item/detail.js';

class ModalDetail {
  /**
   * Creates a new instance of modal input.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
    this.detailAssignOutletList = $(`#${attributeName()[0]['detailAssignOutletList']}`);
    this.itemTable = $(`#${attributeName()[0]['itemTable']}`);
  }
  /**
   * open detail modal
   */
  modalDetailPromoProdukHandler(data) {
    this.modalDetail.modal('show');
    detailElement(data.promo);

    const outlet = typeof data == 'undefined' ? [] : data.assign_outlet;
    this.detailAssignOutletList.empty();
    const outletHandler = outlet.map((outlets) => detailOutletElement(outlets)).join('');
    this.detailAssignOutletList.append(outletHandler);

    const item = typeof data == 'undefined' ? [] : data.item;
    $(`${this.itemTable.selector} tbody`).empty();
    const itemHandler = item.map((items) => detailItemElemet(items)).join('');
    $(`${this.itemTable.selector} tbody`).append(itemHandler);
  }
}

export { ModalDetail };
