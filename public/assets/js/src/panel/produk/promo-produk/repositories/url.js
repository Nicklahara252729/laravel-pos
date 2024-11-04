/**
 * url listing data
 */
function urlDataPromoProduk(page, keyword, kategori) {
  let queryParam = ``;
  if (keyword && kategori) {
    queryParam = `&search=${keyword}&kategori=${kategori}`;
  } else if (keyword && !kategori) {
    queryParam = `&search=${keyword}`;
  }
  return `/api/backoffice/produk/promo-produk/data?page=${page}${queryParam}`;
}
