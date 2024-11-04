/**
 * import component
 */
import { RegionData } from './RegionData.js';

class RegionRender extends RegionData {
  constructor() {
    super();
    this.provinsiSelect = $('#province');
    this.kabupatenSelect = $('#city');
    this.kecamatanSelect = $('#district');
    this.desaSelect = $('#village');
  }

  /**
   * prepare select option
   * @param {*} select 
   */
  prepareSelect = async (select) => {
    select.append(`<option value="" selected >${select.data('text')}</option>`);
  };

  /**
   * setup provinsi select
   */
  setupProvinsiSelect = async () => {
    const data = await this.getDataProvinsi();
    this.provinsiSelect.empty();
    this.prepareSelect(this.provinsiSelect);
    data.forEach((provinsi) => {
      const option = `<option value="${provinsi.id}">${provinsi.name}</option>`;
      this.provinsiSelect.append(option);
    });
  };

  /**
   * setup kabupaten select
   * @param {*} id_provinsi 
   */
  setupKabupatenSelect = async (id_provinsi) => {
    const data = await this.getDataKabupatenByIdProvinsi(id_provinsi);
    this.kabupatenSelect.empty();
    this.prepareSelect(this.kabupatenSelect);
    data.forEach((kabupaten) => {
      const option = `<option value="${kabupaten.id}">${kabupaten.name}</option>`;
      this.kabupatenSelect.append(option);
    });
  };

  /**
   * setup kecamatan select
   * @param {*} id_kabupaten 
   */
  setupKecamatanSelect = async (id_kabupaten) => {
    const data = await this.getDataKecamatanByIdKabupaten(id_kabupaten);
    this.kecamatanSelect.empty();
    this.prepareSelect(this.kecamatanSelect);
    data.forEach((kecamatan) => {
      const option = `<option value="${kecamatan.id}">${kecamatan.name}</option>`;
      this.kecamatanSelect.append(option);
    });
  };

  /**
   * setup desa select
   * @param {*} id_kecamatan 
   */
  setupDesaSelect = async (id_kecamatan) => {
    const data = await this.getDataDesaByIdKecamatan(id_kecamatan);
    this.desaSelect.empty();
    this.prepareSelect(this.desaSelect);
    data.forEach((desa) => {
      const option = `<option value="${desa.id}">${desa.name}</option>`;
      this.desaSelect.append(option);
    });
  };
}

export { RegionRender };
