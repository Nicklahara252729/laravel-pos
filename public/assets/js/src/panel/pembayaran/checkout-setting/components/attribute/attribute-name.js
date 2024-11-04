/**
 * set attribute value
 * @returns
 */
const attributeName = () => {
  const data = [
    {
      /**
       * component
       */
      gratuityActivation: 'gratuity-activation',
      taxActivation: 'tax-activation',
      taxGratuityType: 'tax-gratuity-type',
      roundingActivation: 'rounding-activation',
      roundingType: 'rounding-type',
      roundingNumber: 'rounding-number',
      stockLimit: 'stock-limit',
      stockLimitType: 'stock-limit-type',

      /**
       * form
       */
      formInput: 'form-input',
      submitButton: 'submit-button',
      enableRoundingOption: 'enabled-rounding-options',
      enableStockLimitOption: 'enabled-stock-limit-options',
      taxGratuityType1: 'tax-gratuity-type-1',
      taxGratuityType2: 'tax-gratuity-type-2',
      roundingType1: 'rounding-type-1',
      roundingType2: 'rounding-type-2',
    },
  ];
  return data;
};

export { attributeName };
