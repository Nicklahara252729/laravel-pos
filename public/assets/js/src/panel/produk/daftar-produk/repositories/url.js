/**
 * url listing data
 */
function urlDaftarProduk(page, kategori) {
  const queryParam = kategori ? `&kategori=${kategori}` : ``;
  return `/api/backoffice/produk/daftar-produk/data?page=${page}${queryParam}`;
}

/**
 * url search data
 */
function urlSearchDaftarProduk(page, keyword, kategori) {
  let queryParam = ``;
  if (keyword && kategori) {
    queryParam = `&search=${keyword}&kategori=${kategori}`;
  } else if (keyword && !kategori) {
    queryParam = `&search=${keyword}`;
  }
  return `/api/backoffice/produk/daftar-produk/data?page=${page}${queryParam}`;
}
