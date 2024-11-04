/**
 * url data
 */
const urlData = {
  income: '/api/backoffice/laporan/penjualan-produk/data/income',
  quantity: '/api/backoffice/laporan/penjualan-produk/data/quantity',
};

/**
 * get all data penjualan produk API
 */
const getPenjualanProdukAPI = async (url) => {
  try {
    const response = await sendApiRequest(
      {
        url: url,
        type: 'GET',
      },
      {
        isLoading: true,
        outlet: true,
      }
    );
    return response.data;
  } catch (e) {
    if (e.status == 404) {
      swalNotFound({ data: 'Penjualan Produk', in: 'Outlet' });
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * export ringkasan penjualan barang API
 */
const exportRingkasanAPI = (uuidOutlet) => {
  return `/laporan/penjualan-produk/export/ringkasan/${uuidOutlet}`;
};

/**
 * export laporan perjam terjual API
 */
const exportPerjamTerjualAPI = (uuidOutlet) => {
  return `/laporan/penjualan-produk/export/perjam-terjual/${uuidOutlet}`;
};

/**
 * export jumlah yang terjual laporan perjam API
 */
const exportJumlahPerjamAPI = (uuidOutlet) => {
  return `/laporan/penjualan-produk/export/jumlah-perjam/${uuidOutlet}`;
};

export { getPenjualanProdukAPI, exportRingkasanAPI, exportPerjamTerjualAPI, exportJumlahPerjamAPI };
