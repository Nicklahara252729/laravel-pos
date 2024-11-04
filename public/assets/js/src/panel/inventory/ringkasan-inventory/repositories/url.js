/**
 * url ringkasan inventory
 */
function urlRingksanInventory(kategori, page, keyword) {
  let queryParam = ``;
  if (keyword && kategori) {
    queryParam = `&search=${keyword}&kategori=${kategori}`;
  } else if (keyword) {
    queryParam = `&search=${keyword}`;
  } else if (kategori) {
    queryParam = `&kategori=${kategori}`;
  }
  return `/api/backoffice/inventory/ringkasan-inventory/data?page=${page}${queryParam}`;
}
