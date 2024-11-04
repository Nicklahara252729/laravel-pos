/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component item
 */
import { sistemElement } from '../components/item/sistem.js';
import { infoBisnisElement } from '../components/item/info-bisnis.js';
import { npwpElement } from '../components/item/npwp.js';

/**
 * import repositories
 */
import { getPengaturanAPI } from '../repositories/repositories.js';

/**
 * defined component
 */
const sistemContainer = $(`.${attributeName()[0]['sistemContainer']}`);

/**
 * render setting handler
 */
const pengaturanHandler = async () => {
  sistemContainer.empty();

  /**
   * load data
   */
  const data = await getPengaturanAPI();
  const dataSistem = data.sistem;
  const dataInfoBisnis = data.info_bisnis;
  const dataNpwp = data.npwp;

  /**
   * load sistem element
   */
  const sistemElementHanlder = dataSistem.map((data) => sistemElement(data)).join('');
  sistemContainer.append(sistemElementHanlder);

  /**
   * load info bisnis element
   */
  infoBisnisElement(dataInfoBisnis);
  npwpElement(dataNpwp);
};

/**
 * render outlet table
 */
const init = async () => {
  await pengaturanHandler();
};

export { init };
