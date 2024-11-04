/**
 * get all data kategori API
 */
const getKategoriProdukAPI = async (page, keyword) => {
  try {
    const url =
      keyword === null
        ? `/api/backoffice/produk/kategori-produk/data?page=${page}`
        : `/api/backoffice/produk/kategori-produk/data?search=${keyword}&page=${page}`;
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
      page === 1 ? swalNotFound({ data: 'Kategori', in: 'Outlet' }) : swal.close();
    } else {
      const { responseJSON } = e;
      const message = e instanceof ReferenceError ? error.message : responseJSON.message;
      swalError(message);
    }
  }
};

/**
 * get data kategori by id API
 */
const getKategoriProdukByIdAPI = async (uuidTax) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/kategori-produk/get/${uuidTax}`,
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
 * delete data kategori API
 */
const deleteKategoriProdukAPI = async (uuidTax) => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/produk/kategori-produk/delete/${uuidTax}`,
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
 * update data kategori API
 */
const updateKategoriProdukAPI = (uuidTax) => {
  return `/api/backoffice/produk/kategori-produk/update/${uuidTax}`;
};

/**
 * store data kategori API
 */
const saveKategoriProdukAPI = () => {
  return `/api/backoffice/produk/kategori-produk/save`;
};

/**
 * assign item API
 */
const saveAssignItemAPI = (uuid) => {
  return `/api/backoffice/produk/kategori-produk/assign-item/${uuid}`;
};

export {
  getKategoriProdukAPI,
  getKategoriProdukByIdAPI,
  deleteKategoriProdukAPI,
  updateKategoriProdukAPI,
  saveKategoriProdukAPI,
  saveAssignItemAPI,
};
