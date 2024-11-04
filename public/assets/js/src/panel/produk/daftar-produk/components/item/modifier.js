/**
 * create modifier input
 */
const createModifier = (datas) => {
  const modifier = datas.map((data, index) => {
    return `
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="modifier${index}" name="modifier[]">
            <label class="form-check-label" for="modifier${index}">
                ${data.modifier_name}
            </label>
        </div>
      `;
  });
  return modifier.join('');
};

export { createModifier };
