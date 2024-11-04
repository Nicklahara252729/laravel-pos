/**
 * title alert
 */
const titleSuccess = 'Berhasil';
const titleError = 'Terjadi kesalahan';
const titleWarning = 'Perhatian';
const titleCancel = 'Dibatalkan';
const titleConfirmDelete = 'Hapus Data Ini ?';
const titleConfirmNonaktif = 'Nonaktifkan Data Ini ?';
const titleConfirmActivation = 'Aktifkan Data Ini ?';
const titleConfirmLogout = 'Logout?';
const titleNotFound = 'Data tidak ditemukan';
const titleConfirmVerification = 'Lakukan Verifikasi?';
const titleImportChange = 'Ubah data saat ini?';
const titleConfirmDuplicate = 'Duplicate data ini?'

/**
 * icon alert
 */
const iconSuccess = 'success';
const iconError = 'error';
const iconWarning = 'warning';
const iconInfo = 'info';

/**
 * text alert
 */
const textCancelDelete = 'Data Batal Dihapus';
const textCancelNonaktif = (param) => {
  return `${param} Batal dinonaktifkan`;
};
const textCancelActivation = (param) => {
  return `${param} Batal diaktifkan`;
};
const textConfirmDelete = (param) => {
  return `Yakin ingin menghapus ${param}? Data yang telah dihapus tidak dapat dikembalikan`;
};
const textConfirmRestore = (param) => {
  return `Yakin ingin mengembalikan data ${param}?`;
};
const textConfirmNonaktif = (param) => {
  return `Yakin ingin menonaktifkan ${param}? Anda dapat mengaktifkan kembali data ini nanti`;
};
const textConfirmActivation = (param) => {
  return `Yakin ingin mengaktifkan ${param} kembali?`;
};
const textConfirmLogout = 'Apakah anda yakin ingin keluar?';
const textNotFound = (param) => {
  return `Data ${param.data} tidak ditemukan di ${param.in} ini`;
};
const textConfirmVerification = (param) => {
  let message = `Yakin ingin memverifikasi ${param} ini?`;
  if (param === 'kontak') {
    message =
      message +
      ' Kode verifikasi akan dikirim ke whatsapp kamu, pastikan nomor terhubung ke whatsapp.';
  }
  return message;
};
const textConfirmResend = (param) => {
  return `Yakin ingin mengirim ulang ${param} ini?`;
};
const textImportChangeConfirmation = () => {
  return `Apakah kamu yakin ingin mengubah daftar bahan? Jika bahan kamu memiliki Pelacakan HPP atau terkait dengan Resep, maka Jumlah Biaya bahan tidak dapat diubah`;
};
const textConfirmDuplicate = (param) => {
  return `Yakin ingin duplikat ${param} ini?`;
};
