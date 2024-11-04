/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * create bahan input
 */
const createBahanInput = (datas) => {
  const bahan = datas.map((data, index) => {
    const jumlah = data.jumlah ? data.jumlah : data.qty;
    const biaya = data.hpp ? data.hpp : data.biaya;
    const subtotal = jumlah * biaya;
    return `
            <section data-index="${index}">
                <div class="flex justify-between mb-2">
                    <label class="mt-2">Bahan ${index + 1}</label>
                    <button class="btn btn-danger delete-option-button" type="button"><i class="bx bx-trash-alt"></i></button>
                </div>
                <div class="flex justify-between">
                    <div class="form-group mb-2">
                        <label for="name">Nama bahan</label>
                        <input type="text" readonly class="form-control" name="nama_bahan[]"
                            placeholder="Masukkan nama bahan" value="${data.item}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="name">Jumlah</label>
                        <input type="number" min="0" class="form-control jumlah-input" name="jumlah[]"
                            placeholder="Masukkan jumlah" value="${jumlah}" data-index="${index}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="name">Satuan unit</label>
                        <input type="text" readonly class="form-control" name="satuan[]"
                            placeholder="Masukkan satuan" value="${data.satuan}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="name">Biaya</label>
                        <input type="number" min="0" class="form-control biaya-input" name="biaya[]"
                            placeholder="Masukkan Biaya" value="${biaya}" data-index="${index}">
                    </div>
                </div>
                <div class="flex justify-between mb-2">
                    <label class="mt-2">Subtotal Bahan ${index + 1}</label>
                    <label class="subtotal" id="subtotal-${index}">Rp ${formatCurrency(subtotal)}</label>
                </div>
            </section>
      `;
  });
  return bahan.join('');
};

/**
 * bahan item component
 */
const bahanItemEl = (row) => {
  const { uuid_ingredient_library, ingredient_name, satuan_pengukuran, harga } = row;
  return `
    <li data-satuan='${satuan_pengukuran}' data-item='${ingredient_name}' data-hpp='${harga}'>
        <input type="checkbox" name="uuid_bahan[]" value="${uuid_ingredient_library}" id="option-${uuid_ingredient_library}" class="hidden peer">
        <label for="option-${uuid_ingredient_library}" class="inline-flex items-center justify-between w-full py-2 px-3 text-gray-500 border-[1px] border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white hover:text-gray-600 hover:bg-gray-200 duration-150">                           
            <div class="block">
                <div class="w-full text-sm">${ingredient_name}</div>
            </div>
        </label>
    </li>
    `;
};

// Function to recalculate and update subtotal
const recalculateSubtotal = (index) => {
  const jumlahInput = document.querySelector(`input.jumlah-input[data-index="${index}"]`).value;
  const biayaInput = document.querySelector(`input.biaya-input[data-index="${index}"]`).value;
  const subtotal = jumlahInput * biayaInput;
  const subtotalElement = document.getElementById(`subtotal-${index}`);
  subtotalElement.textContent = `Rp ${formatCurrency(subtotal)}`;
};

// Event listeners for updating subtotal on input change
document.addEventListener('input', (event) => {
  if (event.target.matches('.jumlah-input') || event.target.matches('.biaya-input')) {
    const index = event.target.getAttribute('data-index');
    recalculateSubtotal(index);
  }
});

export { createBahanInput, bahanItemEl };
