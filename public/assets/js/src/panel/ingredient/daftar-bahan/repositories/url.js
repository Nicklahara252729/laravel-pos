/**
 * url listing data
 */
function urlDaftarBahan(page, tipe, kategori) {
  let queryParam = ``;
  if (tipe && kategori) {
    queryParam = `&tipe=${tipe}&kategori=${kategori}`;
  } else if (tipe) {
    queryParam = `&tipe=${tipe}`;
  } else if (kategori) {
    queryParam = `&kategori=${kategori}`;
  }
  return `/api/backoffice/ingredient/daftar-bahan/data?page=${page}${queryParam}`;
}

/**
 * url search data
 */
function urlSearchDaftarBahan(page, keyword, tipe, kategori) {
  let queryParam = ``;
  if (tipe && kategori) {
    queryParam = `&tipe=${tipe}&kategori=${kategori}`;
  } else if (tipe) {
    queryParam = `&tipe=${tipe}`;
  } else if (kategori) {
    queryParam = `&kategori=${kategori}`;
  }
  return `/api/backoffice/ingredient/daftar-bahan/data?page=${page}&search=${keyword}${queryParam}`;
}
