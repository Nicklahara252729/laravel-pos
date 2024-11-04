/**
 * url PO
 */
function urlPO(page, kategori, dateRange) {
  let queryParam = ``;
  if (kategori && dateRange) {
    queryParam = `&kategori=${kategori}&date=${getValueFromLocalStorage()}`;
  } else if (kategori && !dateRange) {
    queryParam = `&kategori=${kategori}`;
  } else if (!kategori && dateRange) {
    queryParam = `&date=${getValueFromLocalStorage()}`;
  }
  return `/api/backoffice/inventory/purchasing-order/data?page=${page}${queryParam}`;
}

/**
 * url search data
 */
function urlSearchPO(page, keyword, kategori, dateRange) {
  let queryParam = ``;
  if (keyword && kategori && dateRange) {
    queryParam = `&search=${keyword}&kategori=${kategori}&date=${getValueFromLocalStorage()}`;
  } else if (keyword && !kategori && dateRange) {
    queryParam = `&search=${keyword}&date=${getValueFromLocalStorage()}`;
  } else if (keyword && kategori && !dateRange) {
    queryParam = `&search=${keyword}&kategori=${kategori}`;
  } else if (keyword && !kategori && dateRange) {
    queryParam = `&search=${keyword}&date=${getValueFromLocalStorage()}`;
  }else if (keyword && !kategori && !dateRange) {
    queryParam = `&search=${keyword}`;
  }
  return `/api/backoffice/inventory/purchasing-order/data?page=${page}${queryParam}`;
}
