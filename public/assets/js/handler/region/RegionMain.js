/**
 * import component
 */
import { RegionHandler } from "./RegionHandler.js";

class RegionMain extends RegionHandler {
    constructor() {
        super();
        this.setupProvinsiSelect();
        this.provinsiSelect.on("change", this.provinceOnChange);
        this.kabupatenSelect.on("change", this.kabupatenOnChange);
        this.kecamatanSelect.on("change", this.kecamatanOnChange);
    }

    /**
     * set default value
     * @param {*} id_provinsi 
     * @param {*} id_kabupaten 
     * @param {*} id_kecamatan 
     * @param {*} id_desa 
     */
    setDefaultValue = async (
        id_provinsi,
        id_kabupaten,
        id_kecamatan,
        id_desa
    ) => {

        /**
         * setup provinsi select
         */
        await this.setupProvinsiSelect();
        this.provinsiSelect.val(id_provinsi).trigger("change");
    
        /**
         * setup kabupaten select
         */
        await this.setupKabupatenSelect(id_provinsi);
        this.kabupatenSelect.val(id_kabupaten).trigger("change");
    
        /**
         * setup kecamatan select
         */
        await this.setupKecamatanSelect(id_kabupaten);
        this.kecamatanSelect.val(id_kecamatan).trigger("change");
    
        /**
         * setup desa select
         */
        await this.setupDesaSelect(id_kecamatan);
        this.desaSelect.val(id_desa).trigger("change");
    };
}

export { RegionMain };