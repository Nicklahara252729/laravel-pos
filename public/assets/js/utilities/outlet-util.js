/**
 * Function to set the default outlet in local storage
 */
const setDefaultOutlet = (outlet) => {
  localStorage.setItem('defaultOutlet', JSON.stringify(outlet));
};

/**
 * Function to retrieve the default outlet from local storage
 */
const getDefaultOutlet = () => {
  const defaultOutlet = JSON.parse(localStorage.getItem('defaultOutlet'));
  return defaultOutlet || {};
};

/**
 * get default outlet uuid
 */
const getDefaultOutletUuid = () => {
  const defaultOutlet = JSON.parse(localStorage.getItem('defaultOutlet'));
  return defaultOutlet.uuid_outlet;
};

/**
 * get default outlet name
 */
const getDefaultOutletName = () => {
  const defaultOutlet = JSON.parse(localStorage.getItem('defaultOutlet'));
  return defaultOutlet.outlet_name;
};

/**
 * Function to render the default outlet
 */
const renderDefaultOutlet = (outlet) => {
  const { uuid_outlet: outletUuid, outlet_name: outletName } = outlet;
  $('#default-outlet-name').text(outletName);
};

/**
 * Function to render the outlet options
 */
const renderOutletOptions = (outlets) => {
  const outletList = outlets
    .map((outlet) => {
      const { uuid_outlet: outletUuid, outlet_name: outletName } = outlet;
      return `
        <div class="dropdown-item py-3 cursor-pointer" data-outlet-uuid="${outletUuid}">${outletName}</div>
      `;
    })
    .join('');
  $('#outlet-list').empty().append(outletList);
};

/**
 * Function to fetch all outlets
 */
const getAllOutlets = async () => {
  try {
    const response = await sendApiRequest(
      {
        url: `/api/backoffice/profile/daftar-outlet/data`,
        type: 'GET',
      },
      {
        isLoading: true,
        outlet: false,
      }
    );
    const dataList = typeof response == 'undefined' ?? 0;
    if (dataList === true) {
      window.location.reload();
    } else {
      const outlets = response.data;
      const defaultOutlet = getDefaultOutlet();
      if (!defaultOutlet.uuid_outlet) {
        setDefaultOutlet(outlets[0]);
      }
      renderOutletOptions(outlets);
      renderDefaultOutlet(getDefaultOutlet()); // Update the UI with the default outlet
    }
  } catch (e) {
    console.log(e);
    throw e;
  }
};

/**
 * toogle outlet choice
 */
const toogleOutlet = () => {
  const pages = [
    'dashboard',
    'ringkasan-laporan',
    'keuntungan-kotor',
    'metode-pembayaran',
    'tipe-penjualan',
    'penjualan-produk',
    'penjualan-kategori',
    'modifier-sales',
    'diskon',
    'pajak',
    'gratifikasi',
    'collected-by',
    'shift',
    'riwayat-transaksi',
    'invoice',
    'daftar-bahan',
    'kategori-bahan',
    'resep',
    'ringkasan-inventory',
    'purchasing-order',
    'pengaturan-meja',
    'daftar-produk',
    'modifier',
    'pajak-produk',
    'kategori-produk',
    'gratuity',
    'pelanggan',
    'daftar-pegawai',
    'hak-akses',
    'diskon-produk',
    'receipt',
    'checkout-setting',
    'notifikasi'
  ];
  const isPagesDetected = pages.includes(lastSegment);
  if (isPagesDetected) {
    document.getElementById('outlet-choice').style.visibility = 'visible';
  }
};

/**
 * Event listener for outlet selection
 */
const handleOutlet = (afterInitFn) => {
  $('#outlet-list').on('click', '.dropdown-item', function () {
    const outletUuid = $(this).data('outlet-uuid');
    const outletName = $(this).text();
    const outlet = { uuid_outlet: outletUuid, outlet_name: outletName };
    setDefaultOutlet(outlet);
    renderDefaultOutlet(outlet); // Update the UI with the selected outlet
    if (afterInitFn && typeof afterInitFn === 'function') {
      afterInitFn();
    }
  });
};

/**
 * initialize
 */
const outletInit = (afterInitFn) => {
  getAllOutlets();
  toogleOutlet();
  handleOutlet(afterInitFn);
};
