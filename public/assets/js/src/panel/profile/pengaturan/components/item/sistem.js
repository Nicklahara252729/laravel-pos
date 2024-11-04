/**
 * import helper
 */
import { capitalizeFirstLetter } from '../../../../../../helpers/converter.js';

const sistemElement = (rowData) => {
  let element = '';
  const { setting_name, description } = rowData;
  if (setting_name == 'logo') {
    element = `<img src="${description}" class="img-thumbnail" width="100">`;
  } else {
    element = `<div id="application-name">${description}</div>`;
  }
  return `<div class="grid grid-cols-2 md:grid-cols-4 mb-2">
                  <div class="font-bold">${capitalizeFirstLetter(setting_name)}</div>
                  ${element}
                </div>`;
};

export { sistemElement };
