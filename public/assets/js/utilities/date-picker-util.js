/**
 * set date range coockie
 */
const setDateRange = () => {
  const expirationTime = new Date(Date.now() + 3000);
  Cookies.set('alvaDateRange', true, { expires: expirationTime });
};

/**
 * get date range coockie
 */
const getDateRange = () => {
  return Cookies.get('alvaDateRange');
};

/**
 * format value display
 */
const formatValueDisplay = (startDate, endDate) => {
  return startDate.format('MMMM D, YYYY') + ' - ' + endDate.format('MMMM D, YYYY');
};

/**
 * format value storage
 */
const formatValueStorage = (startDate, endDate) => {
  return startDate.format('DD/MM/YYYY') + '-' + endDate.format('DD/MM/YYYY');
};

/**
 * set value to local storage
 */
const setValueToLocalStorage = (value) => {
  localStorage.setItem('dateRange', value);
};

/**
 * get value from local storage
 */
const getValueFromLocalStorage = () => {
  return localStorage.getItem('dateRange');
};

/**
 * date picker initialize
 */
const datePickerInit = (callback) => {
  $('#reportrange').removeClass('d-none');
  const storedValue = getValueFromLocalStorage();

  const defaultStart = storedValue ? moment(storedValue.split('-')[0], 'DD/MM/YYYY') : moment();
  const defaultEnd = storedValue ? moment(storedValue.split('-')[1], 'DD/MM/YYYY') : moment();

  const updateValue = (startDate, endDate) => {
    const formattedValueDisplay = formatValueDisplay(startDate, endDate);
    const formattedValueStorage = formatValueStorage(startDate, endDate);
    setValueToLocalStorage(formattedValueStorage);
    $('#reportrange span').html(formattedValueDisplay);
    callback();
  };

  const handleApply = () => {
    $('#reportrange').on('apply.daterangepicker', (ev, picker) => {
      const startDate = picker.startDate;
      const endDate = picker.endDate;
      const formattedValueDisplay = formatValueDisplay(startDate, endDate);
      const formattedValueStorage = formatValueStorage(startDate, endDate);
      setValueToLocalStorage(formattedValueStorage);
      $('#reportrange span').html(formattedValueDisplay);
      setDateRange();
      callback();
    });
  };

  const options = {
    startDate: defaultStart,
    endDate: defaultEnd,
    ranges: {
      Today: [moment(), moment()],
      Yesterday: [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [
        moment().subtract(1, 'month').startOf('month'),
        moment().subtract(1, 'month').endOf('month'),
      ],
      'This Year': [moment().startOf('year'), moment().endOf('year')],
      'Last Year': [
        moment().subtract(1, 'year').startOf('year'),
        moment().subtract(1, 'year').endOf('year'),
      ],
    },
  };

  $('#reportrange').daterangepicker(options, updateValue);
  $('#reportrange span').html(formatValueDisplay(defaultStart, defaultEnd));
  handleApply();
};
