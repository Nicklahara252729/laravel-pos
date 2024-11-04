/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { outletItemEl, listingOutlet } from '../item/assign-outlet.js';

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
    this.container = $(`.${attributeName()[0]['assignOutletContainer']}`);
    this.outletEl = $(`#${attributeName()[0]['outletAssignList']}`);
    this.searchOutletList = $(`#${attributeName()[0]['searchOutletList']}`);
    this.modalInput = $(`#${attributeName()[0]['modalInput']}`);
  }

  /**
   * render product list
   */
  async renderOutletList(items) {
    // const items = await getDaftarOutletAPI();

    this.outletEl.empty();
    const outletItems = items.map((item) => {
      return outletItemEl(item);
    });

    if (outletItems.length > 0) {
      this.outletEl.append(outletItems.join(''));
    } else {
      this.outletEl.append('<p class="text-gray-500 text-center">Tidak dapat menemukan outlet</p>');
    }
  }

  /**
   * filter outlet list
   */
  filterOutletList = () => {
    this.searchOutletList.on('keyup', () => {
      const searchValue = this.searchOutletList.val().toLowerCase();
      let productsFound = false;

      $(`${this.outletEl.selector} li`).filter((index, listItem) => {
        const label = $(listItem).find('label').text().toLowerCase();
        const shouldHide = !label.includes(searchValue);
        if (!shouldHide) {
          productsFound = true;
        }
        $(listItem).toggleClass('hidden', shouldHide);
      });

      if (!productsFound) {
        this.searchOutletList.append(
          '<li class="blank-state"><p class="text-gray-500 text-center">Tidak dapat menemukan outlet.</p></li>'
        );
      } else {
        $(`${this.searchOutletList.selector} li.blank-state`).remove();
      }
    });
  };

  /**
   * create option object
   */
  createOutletObjek = () => {
    let outletObj = [];

    // Iterate through the sections
    $(`${this.outletEl.selector} li input[name="uuid_outlet[]"]`).change(function () {
      const outlet = $(this).data('outlet');
      // Get input values within the section
      if (this.checked) {
        // Add the outlet if it is checked and not already in the array
        if (!outletObj.some((o) => o.outlet === outlet)) {
          outletObj.push({ outlet: outlet });
        }
      } else {
        // Remove the outlet if it is unchecked
        outletObj = outletObj.filter((o) => o.outlet !== outlet);
      }
    });

    return outletObj;
  };

  /**
   * outlet insert into main modal
   */
  outletList = (outletObj) => {
    this.modal.on('click', this.buttonSubmit.selector, () => {
      this.container.toggle(true);
      listingOutlet(outletObj);
      this.modal.modal('hide');
    });
  };

  /**
   * open modal handler
   */
  async openModalHandler(param) {
    this.modal.modal('show');
    $(`${this.modalInput.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalInput.selector} .modal-content`).removeClass('dim');
    });
    await this.renderOutletList(param.dataOutlet);
    this.filterOutletList();
    const outletObj = this.createOutletObjek();
    this.outletList(outletObj);
  }
}

export { ModalAssignOutlet };
