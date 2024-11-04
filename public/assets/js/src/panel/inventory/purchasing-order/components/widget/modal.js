/**
 * import repositories
 */
import { getDaftarBahanAPI } from '../../../../ingredient/daftar-bahan/repositories/repositories.js';
import { getPOByIdAPI, riwayatPOByIdAPI } from '../../repositories/repositories.js';

/**
 * import component modal
 */
import { ModalBahan } from '../modal/bahan.js';
import { ModalRiwayatPemenuhan } from '../modal/riwayat-pemenuhan.js';
import { ModalUpdateProsesPesanan } from '../modal/update-proses-pesanan.js';

/**
 * defiend class
 */
const bahanModal = new ModalBahan();
const riwayatPemenuhanModal = new ModalRiwayatPemenuhan();
const updateProsesPesananModal = new ModalUpdateProsesPesanan();

/**
 * bahan modal handler
 */
const bahanHandler = async (modal) => {
  const param = { data: await getDaftarBahanAPI(urlDaftarBahan(1)), modal: modal };
  bahanModal.modalBahanHandler(param);
};

/**
 * process riwayat pemenuhan modal handler
 */
const riwayatPemenuhanHandler = (param) => {
  riwayatPemenuhanModal.modalRiwayatPemenuhanHandler(param);
};

/**
 * update proses pemenuhan handler
 */
const updateProsesPesananHandler = async (uuid) => {
  const param = {
    data: await getPOByIdAPI(uuid),
    riwayat: await riwayatPOByIdAPI(uuid),
  };
  updateProsesPesananModal.modalUpdateProsesPesananHandler(param);
};

export { bahanHandler, riwayatPemenuhanHandler, updateProsesPesananHandler };
