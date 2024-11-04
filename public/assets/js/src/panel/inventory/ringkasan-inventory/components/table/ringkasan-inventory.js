/**
 * row table
 */
const metodePembayaranTableElement = (rowData) => {
  const { uuid_ringkasan_inventory, bahan, kategori, stok_awal, stok_akhir, unit } = rowData;
  return `<tr>
            <td>${bahan}</td>
            <td>${kategori}</td>
            <td>${stok_awal}</td>
            <td>${stok_akhir}</td>
            <td>${unit}</td>
        </tr>
    `;
};

export { metodePembayaranTableElement };
