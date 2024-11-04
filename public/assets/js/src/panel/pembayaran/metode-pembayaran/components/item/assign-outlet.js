/**
 * outlet item component
 */
const outletItemEl = (row) => {
    const { uuid_outlet, outlet_name, address, logo } = row;
    return `<li>
              <input type="checkbox" name="produk[]" value="${uuid_outlet}" id="option-${uuid_outlet}" class="hidden peer">
              <label for="option-${uuid_outlet}" class="inline-flex items-center justify-between w-full py-2 px-3 text-gray-500 border-[1px] border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white hover:text-gray-600  hover:bg-gray-200 duration-150">                           
                  <div class="block">
                      <div class="w-full text-sm">${outlet_name}</div>
                  </div>
              </label>
          </li>`;
  };
  
  export { outletItemEl };
  