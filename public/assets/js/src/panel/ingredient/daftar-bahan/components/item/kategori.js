/**
 * datalist
 */
const kategoriEl = (rowData) => {
  const { category_name, uuid_ingredient_category } = rowData;
  return `<a class="dropdown-item" href="javascript:void(0)">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="${uuid_ingredient_category}" name="kategori[]" value="${category_name}">
                <label class="form-check-label" for="${uuid_ingredient_category}">
                    ${category_name}
                </label>
            </div>
          </a>
    `;
};
export { kategoriEl };