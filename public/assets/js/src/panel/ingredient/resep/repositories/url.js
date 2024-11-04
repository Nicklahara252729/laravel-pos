/**
 * url resep produk
 */
function urlProduk(keyword) {
  const queryParam = keyword ? `?search=${keyword}` : ``;
  return `/api/backoffice/ingredient/resep/data/produk${queryParam}`;
}

/**
 * url resep setengah bahan mentah
 */
function urlHalfRaw(keyword) {
  const queryParam = keyword ? `?search=${keyword}` : ``;
  return `/api/backoffice/ingredient/resep/data/bahan-setengah-jadi${queryParam}`;
}
