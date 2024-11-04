/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { createBahanInput, bahanItemEl } from '../item/bahan.js';

class ModalBahan {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modal = $(`#${attributeName()[0]['modalBahan']}`);
    this.bahanContainer = $(`#${attributeName()[0]['bahanContainer']}`);
    this.bahanList = $(`#${attributeName()[0]['bahanList']}`);
    this.searchBahan = $(`#${attributeName()[0]['searchBahan']}`);
    this.submitBahanButton = $(`#${attributeName()[0]['submitBahanButton']}`);
    this.modalInput = $(`#${attributeName()[0]['modalInput']}`);
  }

  /**
   * render bahan list
   */
  renderBahanList(datas) {
    bahanList.empty();
    const bahanItems = datas.map((item) => {
      return bahanItemEl(item);
    });
    if (bahanItems.length > 0) {
      bahanList.append(bahanItems.join(''));
    } else {
      bahanList.append('<p class="text-gray-500 text-center">Tidak dapat menemukan bahan</p>');
    }
  }

  /**
   * filter bahan list
   */
  filterBahanList = () => {
    this.searchBahan.on('keyup', () => {
      const searchValue = this.searchBahan.val().toLowerCase();
      let bahanFound = false;

      $(`${this.bahanList.selector} li`).filter((index, listItem) => {
        const label = $(listItem).find('label').text().toLowerCase();
        const shouldHide = !label.includes(searchValue);
        if (!shouldHide) {
          bahanFound = true;
        }
        $(listItem).toggleClass('hidden', shouldHide);
      });

      if (!bahanFound) {
        this.searchBahan.append(
          '<li class="blank-state"><p class="text-gray-500 text-center">Tidak dapat menemukan bahan.</p></li>'
        );
      } else {
        $(`${this.searchBahan.selector} li.blank-state`).remove();
      }
    });
  };

  /**
   * create bahan object
   */
  createBahanObject = () => {
    const bahanObj = [];
    $(`${this.bahanList.selector} li`).each(function () {
      const section = $(this);
      const uuidBahan = section.find('input[name="uuid_bahan[]"]').val();
      const option = {
        uuid: uuidBahan,
        bahan: section.data('bahan'),
        satuan: section.data('satuan'),
        hpp: section.data('hpp'),
      };
      bahanObj.push(option);
    });

    return bahanObj;
  };

  /**
   * option insert into main modal
   */
  optionTableList = () => {
    this.modal.on('click', this.submitBahanButton.selector, () => {
      this.bahanContainer.toggle(true);
      const bahanObj = this.createBahanObject();
      const bahanInput = createBahanInput(bahanObj);
      this.bahanContainer.empty();
      this.bahanContainer.append(bahanInput);
      this.modal.modal('hide');
    });
  };

  /**
   * Handles modal behavior for variant.
   */
  async modalBahanHandler(data) {
    /**
     * modal opened
     */
    this.modal.modal('show');
    $(`${this.modalInput.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalInput.selector} .modal-content`).removeClass('dim');
    });

    /**
     * callback method
     */
    this.renderBahanList(data);
    this.filterBahanList();
    this.optionTableList();
  }
}

export { ModalBahan };
