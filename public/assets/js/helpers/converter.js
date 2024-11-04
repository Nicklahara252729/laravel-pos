/**
 * format currency
 */
function formatCurrency(amount, decimalCount = 0, decimal = ',', thousands = '.') {
  try {
    decimalCount = Math.abs(decimalCount);
    decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

    const negativeSign = amount < 0 ? '-' : '';

    let i = parseInt((amount = Math.abs(Number(amount) || 0).toFixed(decimalCount))).toString();
    let j = i.length > 3 ? i.length % 3 : 0;

    return (
      negativeSign +
      (j ? i.substr(0, j) + thousands : '') +
      i.substr(j).replace(/(\d{3})(?=\d)/g, '$1' + thousands) +
      (decimalCount
        ? decimal +
          Math.abs(amount - i)
            .toFixed(decimalCount)
            .slice(2)
        : '')
    );
  } catch (e) {
    console.log(e);
  }
}

/**
 * program to convert first letter of a string to uppercase
 * The regex pattern is /^./ matches the first character of a string.
 * The toUpperCase() method converts the string to uppercase.
 */
function capitalizeFirstLetter(str) {
  // converting first letter to uppercase
  const capitalized = str.replace(/^./, str[0].toUpperCase());
  return capitalized;
}

/**
 * format idr
 */
const formattedIdr = (number) =>
  number.toLocaleString('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
  });

/**
 * date converter
 */
function convertDate(dateString) {
  // Define months in Indonesian
  const months = [
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember',
  ];

  // Split the input date string (YYYY-MM-DD) into its components
  const [year, month, day] = dateString.split('-');

  // Convert the month from number to month name using the array
  const monthName = months[parseInt(month) - 1];

  // Return the formatted date string
  return `${day} ${monthName} ${year}`;
}

export { formatCurrency, capitalizeFirstLetter, formattedIdr, convertDate };
