/**
 * import repositories
 */
import { previewReceiptAPI } from '../repositories/repositories.js';

/**
 * import component item
 */
import { receiptElement } from '../components/item/receipt.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined component
 */
const socialMediaSwitch = $(`#${attributeName()[0]['socialMediaSwitch']}`);
const socialMediaGroup = $(`.${attributeName()[0]['socialMediaGroup']}`);
const socialMediaSection = $(`#${attributeName()[0]['socialMediaSection']}`);
const websiteLink = `${attributeName()[0]['websiteLink']}`;
const facebookLink = `${attributeName()[0]['facebookLink']}`;
const twitterLink = `${attributeName()[0]['twitterLink']}`;
const intagramLink = `${attributeName()[0]['intagramLink']}`;
const webPreview = $(`#${attributeName()[0]['webPreview']}`);
const fbPreview = $(`#${attributeName()[0]['fbPreview']}`);
const twitterPreview = $(`#${attributeName()[0]['twitterPreview']}`);
const instaPreview = $(`#${attributeName()[0]['instaPreview']}`);
const notePreview = $(`#${attributeName()[0]['notePreview']}`);

/**
 * render receipt element
 */
const renderReceiptElemet = async () => {
  /**
   * getting data
   */
  const data = await previewReceiptAPI();

  /**
   * call item
   */
  receiptElement(data.data);

  /**
   * switch change
   */
  socialMediaSwitch.change(function () {
    socialMediaGroup.toggle(this.checked);
    socialMediaSection.toggle(this.checked);
  });

  /**
   * keyup
   */
  $('input[type="text"], textarea').keyup(function () {
    const value = $(this).val();
    const id = $(this).attr('id');
    if (id === websiteLink) {
      webPreview.text(value);
    } else if (id === facebookLink) {
      fbPreview.text(value);
    } else if (id === twitterLink) {
      twitterPreview.text(value);
    } else if (id === intagramLink) {
      instaPreview.text(value);
    } else if (id === 'note') {
      notePreview.text(value);
    }
  });
};

/**
 * initialize
 */
const init = async () => {
  await renderReceiptElemet();
};

export { init };
