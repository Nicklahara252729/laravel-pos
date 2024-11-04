/**
 * import component
 */
import { modalDetailDiskonProduk } from '../src/panel/produk/diskon-produk/components/modal/detail.js';
import { modalDetailProdukGratifikasi } from '../src/panel/produk/gratuity/components/modal/detail.js';
import { modalDetailPajakProduk } from '../src/panel/produk/pajak-produk/components/modal/detail.js';
import { modalDetailTipePenjualan } from '../src/panel/produk/tipe-penjualan/components/modal/detail.js';
import { modalDetailProdukModifier } from '../src/panel/produk/modifier/components/modal/detail.js';

class TableManager {
  constructor(tableName, tableData, tableColumn, tableButton, tableAttribute) {
    this.tableName = tableName;
    this.tableData = typeof tableData == 'undefined' ? [] : tableData;
    this.tableColumn = tableColumn;
    this.tableButton = tableButton;
    this.tableAttribute = tableAttribute;
    this.renderTable();
  }

  renderTable = () => {
    const featur = this.tableName.split('-');
    let table = $(this.tableName).DataTable({
      dom:
        "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
      oLanguage: {
        sInfo: 'Showing page _PAGE_ of _PAGES_',
        sSearchPlaceholder: `Cari ${featur[1]}...`,
        sLengthMenu: 'Results :  _MENU_',
      },
      stripeClasses: [],
      lengthMenu: [10, 25, 50, 100, 150, 200, 250],
      pageLength: 10,
      responsive: true,
      bDestroy: true,
      saveState: true,
      data: this.tableData,
      columns: [
        {
          data: null,
          width: '50px',
          sClass: 'text-center',
          orderable: false,
        },
        ...this.tableColumn,
        ...this.tableButton,
      ],
      rowCallback: (row) => {
        if (this.tableAttribute.rowCallback == true) {
          return $(row).addClass('hover:bg-slate-100/25 duration-150 cursor-pointer align-middle');
        }
      },
    });

    /**
     * table numbering
     */
    table
      .on('order.dt search.dt', function () {
        table
          .column(0, {
            search: 'applied',
            order: 'applied',
          })
          .nodes()
          .each(function (cell, i) {
            cell.innerHTML = i + 1;
          });
      })
      .draw();

    /**
     * table row clickable
     */
    if (this.tableAttribute.rowCallback == true) {
      table.on('click', 'tbody td', function () {
        const col = table.cell(this).index().column;
        if (col === 1) {
          if (featur[1] === 'gratuity') {
            const uuid = table.row(this).data().uuid_gratuity;
            modalDetailProdukGratifikasi(uuid);
          } else if (featur[1] === 'pajak') {
            const uuid = table.row(this).data().uuid_tax;
            modalDetailPajakProduk(uuid);
          } else if (featur[1] === 'tipe') {
            const uuid = table.row(this).data().uuid_sales_type;
            modalDetailTipePenjualan(uuid);
          }else if (featur[1] === 'diskon') {
            const uuid = table.row(this).data().uuid_discount;
            modalDetailDiskonProduk(uuid);
          }else if (featur[1] === 'modifier') {
            const uuid = table.row(this).data().uuid_modifier;
            modalDetailProdukModifier(uuid);
          }
        }
      });
    }

    /**
     * update the data
     */
    if (this.tableAttribute.tableClear == true) {
      table.clear().rows.add(this.tableData).draw();
    }

    /**
     * adjust the column sizes
     */
    if (this.tableAttribute.tableColumn == true) {
      table.columns.adjust().draw();
    }
  };
}

export { TableManager };
