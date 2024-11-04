/**
 * import helper
 */
import { formatCurrency } from '../../../../../helpers/converter.js';

/**
 * render windget
 */
const renderSummary = (widgetData) => {
  const elementIdtoWidgetKey = {
    'gross-sales': 'gross_sales',
    'net-sales': 'net_sales',
    'gross-profit': 'gross_profit',
    transactions: 'transactions',
    avg: 'average_sale_per_transaction',
    'gross-margin': 'gross_margin',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    let textValue = ``;

    if (id === `gross-sales` || id === 'net-sales' || id === 'gross-profit' || id === 'avg') {
      textValue = `Rp. ${formatCurrency(widgetValue)}`;
    } else if (id === `gross-margin`) {
      textValue = `${formatCurrency(widgetValue)}%`;
    } else {
      textValue = `${formatCurrency(widgetValue)}`;
    }

    $(`#${id} h4`).text(textValue);
  });
};

export { renderSummary };
