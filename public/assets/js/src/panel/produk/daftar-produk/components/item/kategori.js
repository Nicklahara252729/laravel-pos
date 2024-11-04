/**
 * datalist
 */
const kategoriEl = (rowData) => {
  const { category_name, jumlah_barang, uuid_category } = rowData;
  return `<a class="dropdown-item" href="javascript:void(0)">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="${uuid_category}" name="kategori[]" value="${uuid_category}">
                <label class="form-check-label" for="${uuid_category}">
                    ${category_name}
                </label>
            </div>
          </a>
    `;
};

/**
 * kategori input list element
 */
const kategoriInputEl = (rowData) => {
  const karegoriOption = rowData
    .map((datas) => {
      return `<option value="${datas.uuid_category}">${datas.category_name}</option>`;
    })
    .join('');
  return karegoriOption;
};

export { kategoriEl, kategoriInputEl };