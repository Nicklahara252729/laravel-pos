/**
 * get all data produk API
 */
const getDaftarProdukAPI = async (url) => {
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
      page === 1 ? swalNotFound({ data: 'Daftar Produk', in: 'Sistem' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data produk by id API
 */
const getDaftarProdukByIdAPI = async (uuidItem) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/daftar-produk/get/${uuidItem}`,
        type: 'GET',
      },
      {
        isLoading: true,
        outlet: true,
      }
    );
    return response.data;
  } catch (error) {
    const { responseJSON } = error;
    const message = error instanceof ReferenceError ? error.message : responseJSON.message;
    swalError(message);
  }
};

/**
 * delete daftar produk
 */
const deleteDaftarProdukAPI = async (uuidItem) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/daftar-produk/delete/${uuidItem}`,
        type: 'DELETE',
      },
      {
        isLoading: true,
        outlet: true,
      }
    );
    return response;
  } catch (error) {
    const { responseJSON } = error;
    const message = error instanceof ReferenceError ? error.message : responseJSON.message;
    swalError(message);
  }
};

/**
 * store data daftar produk
 */
const saveDaftarProdukAPI = () => {
  return `/api/backoffice/produk/daftar-produk/save`;
};

/**
 * update data daftar produk
 */
const updateDaftarProdukAPI = (uuidItem) => {
  return `/api/backoffice/produk/daftar-produk/update/${uuidItem}`;
};

/**
 * get item by kategori API
 */
const getDaftarProdukByKategoriAPI = async (uuidKategori) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/daftar-produk/item-by-kategori/${uuidKategori}`,
        type: 'GET',
      },
      {
        isLoading: true,
        outlet: true,
      }
    );
    return response.data;
  } catch (error) {
    const { responseJSON } = error;
    const message = error instanceof ReferenceError ? error.message : responseJSON.message;
    swalError(message);
  }
};

/**
 * export daftar produk API
 */
const exportDaftarProdukAPI = (uuidOutlet) => {
  return `/produk/daftar-produk/export/${uuidOutlet}`;
};

/**
 * import daftar produk API
 */
const importDaftarProdukAPI = () => {
  return `/api/backoffice/produk/daftar-produk/import`;
};

export {
  getDaftarProdukAPI,
  getDaftarProdukByIdAPI,
  deleteDaftarProdukAPI,
  saveDaftarProdukAPI,
  updateDaftarProdukAPI,
  getDaftarProdukByKategoriAPI,
  exportDaftarProdukAPI,
  importDaftarProdukAPI,
};
