class RegionData {
  constructor() {
    this.provinsi = [];
    this.kabupaten = [];
    this.kecamatan = [];
    this.desa = [];
  }

  /**
   * get data provinsi
   * @returns
   */
  getDataProvinsi = async () => {
    try {
      const response = await sendApiRequest(
        {
          url: '/api/region/provinsi/data',
          type: 'GET',
        },
        {
          isLoading: false,
          outlet: false,
        }
      );
      return response.data;
    } catch (error) {
      console.error(error);
      throw error;
    }
  };

  /**
   * get data kabupaten by id provinsi
   * @param {*} idProvinsi
   * @returns
   */
  getDataKabupatenByIdProvinsi = async (idProvinsi) => {
    try {
      const response = await sendApiRequest(
        {
          url: `/api/region/kota/get/id-provinsi/${idProvinsi}`,
          type: 'GET',
        },
        {
          isLoading: false,
          outlet: false,
        }
      );
      return response.data;
    } catch (error) {
      console.error(error);
      throw error;
    }
  };

  /**
   * get data kecamatan by id kabupaten
   * @param {*} idKabupaten
   * @returns
   */
  getDataKecamatanByIdKabupaten = async (idKabupaten) => {
    try {
      const response = await sendApiRequest(
        {
          url: `/api/region/kecamatan/get/id-kota/${idKabupaten}`,
          type: 'GET',
        },
        {
          isLoading: false,
          outlet: false,
        }
      );
      return response.data;
    } catch (error) {
      console.error(error);
      throw error;
    }
  };

  /**
   * get data desa by id kecamatan
   * @param {*} idKecamatan
   * @returns
   */
  getDataDesaByIdKecamatan = async (idKecamatan) => {
    try {
      const response = await sendApiRequest(
        {
          url: `/api/region/desa/get/id-kecamatan/${idKecamatan}`,
          type: 'GET',
        },
        {
          isLoading: false,
          outlet: false,
        }
      );
      return response.data;
    } catch (error) {
      console.error(error);
      throw error;
    }
  };
}

export { RegionData };
