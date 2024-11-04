/**
 * url total
 */
function urlTotalPengaturanMejaLaporan(dateRange) {
  const queryParam = dateRange ? `?date=${getValueFromLocalStorage()}` : ``;
  return `/api/backoffice/outlet/pengaturan-meja/laporan/total${queryParam}`;
}

/**
 * url pengaturan meja grup meja
 */
function urlPengaturanMejaGrupMeja(page, keyword) {
  let queryParam = ``;
  if (keyword) {
    queryParam = `&keyword=${keyword}`;
  }
  return `/api/backoffice/outlet/pengaturan-meja/grup-meja/data?page=${page}${queryParam}`;
}

/**
 * url pengaturan meja laporan
 */
function urlPengaturanMejaLaporan(page, keyword, kategori, dateRange) {
  let queryParam = ``;
  if (keyword && kategori && dateRange) {
    queryParam = `&search=${keyword}&kategori=${kategori}&date=${getValueFromLocalStorage()}`;
  } else if (keyword && !kategori && dateRange) {
    queryParam = `&search=${keyword}&date=${getValueFromLocalStorage()}`;
  } else if (keyword && kategori && !dateRange) {
    queryParam = `&search=${keyword}&kategori=${kategori}`;
  } else if (keyword && !kategori && dateRange) {
    queryParam = `&search=${keyword}&date=${getValueFromLocalStorage()}`;
  } else if (keyword && !kategori && !dateRange) {
    queryParam = `&search=${keyword}`;
  }
  return `/api/backoffice/outlet/pengaturan-meja/laporan/data?page=${page}${queryParam}`;
}
