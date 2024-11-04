/**
 * notification rendering icon
 */
const notificationRenderIcon = (module) => {
  const iconList = [
    {
      module: 'laporan',
      icon: 'bx-file',
    },
    {
      module: 'riwayat transaksi',
      icon: 'bx-time',
    },
    {
      module: 'produk',
      icon: 'bx-grid-alt',
    },
    {
      module: 'bahan dan resep',
      icon: 'bx-food-menu',
    },
    {
      module: 'inventori',
      icon: 'bx-package',
    },
    {
      module: 'pelanggan',
      icon: 'bx-happy',
    },
    {
      module: 'pegawai',
      icon: 'bx-user',
    },
    {
      module: 'outlet',
      icon: 'bx-store',
    },
  ];

  const icon = iconList.find((item) => item.module === module);
  return icon ? icon.icon : 'bx-bell';
};
