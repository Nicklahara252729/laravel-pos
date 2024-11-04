/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['tableOption']}`);

/**
 * render table
 */
const renderTable = (options) => {
  const tableBody = $(`${table.selector} tbody`);
  tableBody.empty();
  if (options && options.length > 0) {
    const formatter = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    });

    options.forEach(function (option) {
      const formattedPrice = formatter.format(option.price).replace(',00', '');

      const rowHtml = `
          <tr>
            <td>${option.name}</td>
            <td class="text-right">${formattedPrice}</td>
          </tr>
        `;
      tableBody.append(rowHtml);
    });
  }
};

/**
 * create option form table
 */
const createOptionsObjectFromTable = () => {
  const optionsObj = [];

  // Iterate through the table rows
  $(`${table.selector} tbody tr`).each(function () {
    const row = $(this);

    // Get the data from each cell in the row
    const optionName = row.find('td:first-child').text();
    let optionPrice = row.find('td:last-child').text();

    // Remove "Rp." prefix and any non-digit characters
    optionPrice = optionPrice.replace('Rp. ', '').replace(/[^0-9]/g, '');

    // Convert the option price to a number
    optionPrice = parseFloat(optionPrice);

    // Create an object for the option
    const option = {
      name: optionName,
      price: optionPrice,
    };

    // Push the option object to the optionsObj array
    optionsObj.push(option);
  });

  return optionsObj;
};

export { renderTable, createOptionsObjectFromTable };
