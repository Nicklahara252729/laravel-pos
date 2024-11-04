/**
 * payment list element
 */
const paymentListElement = (rowData) => {
  let listData = '';
  const { uuid_payment_list, list, icon, row } = rowData;
  if (row.length > 0) {
    const rowsElement = row.map((rows) => subPaymentListElement(rows, list)).join('');
    listData += `<li>
            <div class="relative inline-flex items-center mb-2 item-start justify-between w-full">
                <div class="flex gap-1">
                    <div class="pt-2">
                        <span class="font-medium text-gray-700 pr-10">${list}</span>
                    </div>
                </div>
                <label>
                    <div class="relative cursor-pointer w-full">
                        <div class="relative mt-1">
                            <input type="checkbox" value="${uuid_payment_list}" name="payment_list[]" class="sr-only peer payment-list-parent" data-group="${list}">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                            </div>
                        </div>
                    </div>
                </label>
            </div>
            ${rowsElement}
          </li>
    `;
  } else {
    listData += `<li>
          <div class="relative inline-flex items-center mb-2 item-start justify-between w-full">
              <div class="flex gap-1">
                  <div class="pt-2">
                      <span class="font-medium text-gray-700 pr-10">${list}</span>
                  </div>
              </div>
              <label>
                  <div class="relative cursor-pointer w-full">
                      <div class="relative mt-1">
                          <input type="checkbox" value="${uuid_payment_list}"
                              name="payment_list[]" class="sr-only peer">
                          <div
                              class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                          </div>
                      </div>
                  </div>
              </label>
          </div>
        </li>
    `;
  }
  return listData;
};

/**
 * sub payment list element
 */
const subPaymentListElement = (rowData, parent) => {
  const parents = parent.replace(/ /g, '-');
  const { uuid_payment_list, list, icon } = rowData;
  let image = '';
  if (icon !== null) {
    image = `<img src="${icon}" alt="" class="w-10 aspect-square rounded object-center mr-3">`;
  }
  return `<div class="payment-list-group-${parents} hidden">
                <ul>
                    <li class="flex justify-between items-center items-start">
                        <div class="flex gap-1">
                            ${image}
                            <div class="pt-2">
                                <span class="font-medium text-gray-700 pr-10">${list}</span>
                            </div>
                        </div>
                        <label>
                            <div class="relative mb-2 cursor-pointer">
                                <input type="checkbox" value="${uuid_payment_list}"
                                    name="payment_list[]" class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                </div>
                            </div>
                        </label>
                    </li>
                </ul>
            </div>`;
};

export { paymentListElement };
