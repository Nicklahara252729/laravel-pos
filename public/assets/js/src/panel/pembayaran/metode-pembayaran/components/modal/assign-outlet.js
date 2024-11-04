/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { outletItemEl } from '../item/assign-outlet.js';

class ModalAssignOutlet {
  /**
   * Creates a new instance of modal assign item.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modal = $(`#${attributeName()[0]['modalAssignOutlet']}`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitAssignOutletButton']}`);
    this.outletAssignList = $(`#${attributeName()[0]['outletAssignList']}`);
    this.searchOutletList = $(`#${attributeName()[0]['searchOutletList']}`);
    this.modalInput = $(`#${attributeName()[0]['modalInput']}`);
  }

  /**
   * render product list
   */
  async renderOutletList(items) {
    this.outletAssignList.empty();
    const outletItems = items.map((item) => {
      return outletItemEl(item);
    });

    if (outletItems.length > 0) {
      this.outletAssignList.append(outletItems.join(''));
    } else {
      this.outletAssignList.append(
        '<p class="text-gray-500 text-center">Tidak dapat menemukan outlet</p>'
      );
    }
  }

  /**
   * filter outlet list
   */
  filterOutletList = () => {
    this.this.searchOutletList.on('keyup', () => {
      this.this.searchOutletList.val().toLowerCase();
      let productsFound = false;

      $(`${this.outletAssignList.selector} li`).filter((index, listItem) => {
        const label = $(listItem).find('label').text().toLowerCase();
        const shouldHide = !label.includes(searchValue);
        if (!shouldHide) {
          productsFound = true;
        }
        $(listItem).toggleClass('hidden', shouldHide);
      });

      if (!productsFound) {
        this.this.searchOutletList.append(
          '<li class="blank-state"><p class="text-gray-500 text-center">Tidak dapat menemukan outlet.</p></li>'
        );
      } else {
        $(`${this.this.searchOutletList.selector} li.blank-state`).remove();
      }
    });
  };

  /**
   * open modal handler
   */
  async openModalHandler(param) {
    this.modal.modal('show');
    $(`${this.this.modalInput.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.this.modalInput.selector} .modal-content`).removeClass('dim');
    });
    await this.renderOutletList(param.outlet);
    this.filterOutletList();
  }
}

export { ModalAssignOutlet };
