/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * grup meja table
 */
const grupMejaTableElement = (rowData) => {
  const { uuid_table, grup_meja, status, jumlah_meja } = rowData;
  let statusColor = ``;
  if (status === `active`) {
    statusColor = `<span class="text-success">Aktif</span>`;
  } else {
    statusColor = `<span class="text-danger">Tidak Aktif</span>`;
  }
  return `
    <tr class="hover:bg-slate-100/25 duration-150 cursor-pointer align-middle">
            <td>${grup_meja}</td>
            <td>${statusColor}</td>
            <td>${formatCurrency(jumlah_meja)} Meja</td>
            <td class="text-center">
                <button type="button" class="btn btn-soft-dark detail-button waves-effect waves-light" id="merge-button" data-uuid="${uuid_table}"><i class="mdi mdi-select-group font-size-16 align-middle"></i></button>
                <button type="button" class="btn btn-soft-primary detail-button waves-effect waves-light" id="duplicate-button" data-uuid="${uuid_table}" data-nama="${grup_meja}"><i class="bx bx-copy font-size-16 align-middle"></i></button>
                <button type="button" class="btn btn-soft-warning waves-effect waves-light" id="edit-button" data-uuid="${uuid_table}"><i class="bx bxs-edit-alt font-size-16 align-middle"></i></button>
                <button type="button" class="btn btn-soft-danger waves-effect waves-light" id="delete-button" data-nama="${grup_meja}" data-uuid="${uuid_table}"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>
            </td>
        </tr>
    `;
};

/**
 * laporan table element
 */
const laporanTableElement = (rowData) => {
  const { uuid_table, tanggal, struk, jumlah_meja, status } = rowData;
  let statusColor = ``;
  if (status === 'reservasi') {
    statusColor = `<span class="text-primary">Reservasi</span>`;
  } else if (status === 'done') {
    statusColor = `<span class="text-success">Selesai</span>`;
  } else {
    statusColor = `<span class="text-danger">Batal</span>`;
  }
  return `
    <tr class="hover:bg-slate-100/25 duration-150 cursor-pointer align-middle" data-id="${uuid_table}">
            <td>${tanggal}</td>
            <td>${struk}</td>
            <td>${formatCurrency(jumlah_meja)} Meja</td>
            <td>${statusColor}</td>
        </tr>
    `;
};

export { grupMejaTableElement, laporanTableElement };
