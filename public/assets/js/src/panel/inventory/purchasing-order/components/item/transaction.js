/**
 * no data element
 */
const noDataElement = () => {
  return `<div class="grid grid-cols-1 md:grid-cols-1 gap-5 md:px-40 xl:px-80 mt-10">
                <div class="justify-between items-center text-center">
                    <i class="mdi mdi-file-alert-outline text-9xl text-primary"></i>
                    <h6 class="">Tidak ditemukan untuk data yang kamu cari</h6>
                    <h6 class="mb-3">Mohon sesuaikan kembali nama atau tanggal data yang kamu cari</h6>
                </div>
            </div>`;
};

export { noDataElement };
