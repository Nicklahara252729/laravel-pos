/**
 * product item component
 */
const productItemEl = (row) => {
  const { uuid_item, product_name } = row;
  return `
    <li>
        <input type="checkbox" name="produk[]" value="${uuid_item}" id="option-${uuid_item}" class="hidden peer">
        <label for="option-${uuid_item}" class="inline-flex items-center justify-between w-full py-2 px-3 text-gray-500 border-[1px] border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white hover:text-gray-600  hover:bg-gray-200 duration-150">                           
            <div class="block">
                <div class="w-full text-sm">${product_name}</div>
            </div>
        </label>
    </li>
    `;
};

export { productItemEl };
