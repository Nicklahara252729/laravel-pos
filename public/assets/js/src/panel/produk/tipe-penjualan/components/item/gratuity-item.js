/**
 * gratuity item element
 */
const gratuityItemElement = ({ gratuity_name, amount }) => {
  return `
    <li class="flex justify-between">
        <div class="">${gratuity_name}</div>
        <div class="">${amount}%</div>
    </li>
    `;
};

/**
 * gratuity input item
 */
const gratuityInputItemElement = (data, uuidData = null) => {
  let list = ``;
  data.forEach((datas, i) => {
    let checking = `checked`;
    if (
      uuidData !== null &&
      uuidData[i] !== undefined &&
      uuidData[i].uuid_gratuity === datas.uuid_gratuity
    ) {
      checking = `checked`;
    }
    list += `
        <li>
          <input type="radio" name="uuid_gratuity[]" value="${datas.uuid_gratuity}" id="option-${datas.uuid_gratuity}" class="hidden peer" ${checking}>
          <label for="option-${datas.uuid_gratuity}" class="inline-flex items-center justify-between w-full py-2 px-3 text-gray-500 border-[1px] border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white hover:text-gray-600  hover:bg-gray-200 duration-150">
            <div class="flex justify-between gap-3 w-full">
              <div class=text-sm">${datas.gratuity_name}</div>
              <div class=text-sm">${datas.amount} %</div>
            </div>
          </label>
        </li>
      `;
  });
  return list;
};

export { gratuityItemElement, gratuityInputItemElement };
