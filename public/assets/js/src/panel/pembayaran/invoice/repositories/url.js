/**
 * url listing data
 */
function urlDataInvoice(page, status) {
  const queryParam = status ? `&status=${status}` : ``;
  return `/api/backoffice/pembayaran/invoice/data?page=${page}${queryParam}`;
}

/**
 * url search data
 */
function urlSearchDataInvoice(page, keyword, status) {
  let queryParam = ``;
  if (keyword && status) {
    queryParam = `&search=${keyword}&status=${status}`;
  } else if (keyword && !status) {
    queryParam = `&search=${keyword}`;
  } else if (!keyword && status) {
    queryParam = `&status=${status}`;
  }
  return `/api/backoffice/pembayaran/invoice/data?page=${page}${queryParam}`;
}
