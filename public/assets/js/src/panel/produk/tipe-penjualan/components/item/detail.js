/**
 * detail elment
 * @param {*} widgetData
 */
const detailElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'detail-nama-tipe-penjualan': 'sales_type_name',
    'detail-status': 'sales_status',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    if (id === 'detail-nama-tipe-penjualan') {
      $(`#${id}`).text(`${widgetValue}`);
    } else {
      const detailStatus =
        widgetValue === 'active'
          ? `<span class="text-success">Aktif</span>`
          : `<span class="text-danger">Tidak Aktif</span>`;
      $(`#${id}`).empty();
      $(`#${id}`).append(detailStatus);
    }
  });
};

/**
 * detail gratuity list element
 */
const detailGratuityListElement = (data) => {
  const { gratuity_name, amount } = data;
  let list = `<li class="flex justify-between">
                <div class="text-muted">Nama Gratifikasi</div>
                <div class="text-muted">Jumlah</div>
              </li>`;
  list += `
    <li class="flex justify-between">
      <div class="">${gratuity_name}</div>
      <div class="">${amount}</div>
    </li>
    `;
  return list;
};

export { detailElement, detailGratuityListElement };
