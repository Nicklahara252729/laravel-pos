// Generate the HTML for the printable content
const invoicePrint = (data) => {
  let htmlContent = '<div>';

  // Assuming data is an array of objects
  htmlContent += `
        <table>
          <thead>
            <tr>
              <th>Column 1</th>
              <th>Column 2</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      `;

  htmlContent += '</div>';
  return htmlContent;
};

export { invoicePrint };
