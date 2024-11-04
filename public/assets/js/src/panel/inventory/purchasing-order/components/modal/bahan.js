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
    this.addBahanContainer = $(`#${attributeName()[0]['bahanContainer']}`);
    this.updateBahanContainer = $(`#${attributeName()[0]['updateBahanContainer']}`);
    this.modalAdd = $(`#${attributeName()[0]['modalAdd']}`);
    this.modalUpdate = $(`#${attributeName()[0]['modalUpdate']}`);
    this.bahanList = $(`#${attributeName()[0]['bahanList']}`);
    this.searchBahan = $(`#${attributeName()[0]['searchBahan']}`);
    this.submitBahanButton = $(`#${attributeName()[0]['submitBahanButton']}`);
  }

  /**
   * render bahan list
   */
  renderBahanList(datas) {
    this.bahanList.empty();
    const bahanItems = datas.map((item) => {
      return bahanItemEl(item);
    });
    if (bahanItems.length > 0) {
      this.bahanList.append(bahanItems.join(''));
    } else {
      this.bahanList.append('<p class="text-gray-500 text-center">Tidak dapat menemukan bahan</p>');
    }
  }

  /**
   * filter bahan list
   */
  filterBahanList = () => {
    this.searchBahan.on('keyup', () => {
      this.searchBahan.val().toLowerCase();
      let bahanFound = false;

      $(`${this.bahanList} li`).filter((index, listItem) => {
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
        $(`${this.searchBahan} li.blank-state`).remove();
      }
    });
  };

  /**
   * create bahan object
   */
  createBahanObject = () => {
    const bahanObj = [];
    $(`${this.bahanList} li`).each(function () {
      const section = $(this);
      const uuidBahan = section.find('input[name="uuid_bahan[]"]').val();
      const option = {
        uuid: uuidBahan,
        item: section.data('item'),
        satuan: section.data('satuan'),
        hpp: section.data('hpp'),
        jumlah: 1,
      };
      bahanObj.push(option);
    });

    return bahanObj;
  };

  /**
   * option insert into main modal
   */
  optionTableList = (modal) => {
    this.modal.on('click', this.submitBahanButton.selector, () => {
      const bahanObj = this.createBahanObject();
      const bahanInput = createBahanInput(bahanObj);

      if (modal === 'add') {
        this.addBahanContainer.toggle(true);
        this.addBahanContainer.empty();
        this.addBahanContainer.append(bahanInput);
      } else {
        this.updateBahanContainer.append(bahanInput);
      }
      this.modal.modal('hide');
    });
  };

  /**
   * Handles modal behavior for variant.
   */
  async modalBahanHandler(param) {
    /**
     * modal opened
     */
    const modal = param.modal === 'add' ? this.modalAdd : this.modalUpdate;
    this.modal.modal('show');
    $(`${modal.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${modal.selector} .modal-content`).removeClass('dim');
    });

    /**
     * callback method
     */
    this.renderBahanList(param.data);
    this.filterBahanList();
    this.optionTableList(param.modal);
  }
}

export { ModalBahan };
