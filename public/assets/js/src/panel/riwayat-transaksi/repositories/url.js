/**
 * url total
 */
function urlTotalRiwayatTransaksi(dateRange) {
  const queryParam = dateRange ? `&date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/riwayat-transaksi/total${queryParam}`;
}

/**
 * url listing data
 */
function urlDataRiwayatTransaksi(page, dateRange) {
  const queryParam = dateRange ? `&date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/riwayat-transaksi/data?page=${page}${queryParam}`;
}

/**
 * url search data
 */
function urlSearchRiwayatTransaksi(page, keyword, dateRange) {
  let queryParam = ``;
  if (keyword && dateRange) {
    queryParam = `&search=${keyword}&date=${getValueFromLocalStorage()}`;
  } else if (keyword && !dateRange) {
    queryParam = `&search=${keyword}`;
  }
  return `/api/backoffice/riwayat-transaksi/data?page=${page}${queryParam}`;
}
