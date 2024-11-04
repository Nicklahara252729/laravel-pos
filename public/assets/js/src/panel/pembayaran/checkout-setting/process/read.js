/**
 * import repositories
 */
import { getCheckoutSettingAPI, updateCheckoutSettingAPI } from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component form
 */
import { formInput } from '../components/form/input.js';

/**
 * defined component
 */
const roundingInput = $(`#${attributeName()[0]['roundingActivation']}`);
const stockLimitInput = $(`#${attributeName()[0]['stockLimit']}`);
const enableRoundingOption = $(`#${attributeName()[0]['enableRoundingOption']}`);
const enableStockLimitOption = $(`#${attributeName()[0]['enableStockLimitOption']}`);
const stockLimit = $(`#${attributeName()[0]['stockLimit']}`);

/**
 * show option input element
 */
const showAdditionalOptionsBasedOnInputs = () => {
  const isRoundingChecked = roundingInput.is(':checked');
  const isStockLimitChecked = stockLimitInput.is(':checked');
  enableRoundingOption.toggle(isRoundingChecked);
  enableStockLimitOption.toggle(isStockLimitChecked);
};

/**
 * setup option handler
 */
const setupOptionHandler = () => {
  $(`${roundingActivation.selector}, ${stockLimit.selector}`).on(
    'change',
    showAdditionalOptionsBasedOnInputs
  );
  showAdditionalOptionsBasedOnInputs();
};

/**
 * receipt handler
 */
const checkoutSettingHandler = async () => {
  setupOptionHandler();
  const uuidOutlet = getDefaultOutletUuid();
  const data = await getCheckoutSettingAPI(uuidOutlet);
  const url = updateCheckoutSettingAPI(uuidOutlet);
  formInput.fillForm(data);
  formInput.setMethod('PUT');
  formInput.setAction(url);
};

/**
 * initialize
 */
const init = async () => {
  checkoutSettingHandler();
  showAdditionalOptionsBasedOnInputs();
};

export { init, showAdditionalOptionsBasedOnInputs };
