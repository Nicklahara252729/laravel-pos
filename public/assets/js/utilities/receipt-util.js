/**
 * receipt header
 */
const receiptHeader = (data) => {
  return `<section class="flex flex-wrap gap-2 mb-4">
            <div class="w-full flex justify-center mb-1">
                <img src="${data.logo}" alt="" class="rounded-full w-40">
            </div>
            <h4 class="w-full flex justify-center">
                ${data.outlet}
            </h4>
            <div class="w-full flex justify-center">
                ${data.alamat}
            </div>
            <div class="w-full flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                </svg>
                ${data.phone}
            </div>
        </section>`;
};

/**
 * receipt footer
 */
const receiptFooter = (data) => {
  return `<section class="mb-4 px-5 border-t-2" id="social-media-section">
          <ul class="grid grid-cols-1 gap-2 my-3 m-0 p-0">
              <li class="group hover:translate-x-1 duration-200">
                  <a href=""
                      class="flex items-center gap-2 text-gray-950 hover:text-blue-500 duration-300">
                      <i class="bx bx-globe text-[1.3rem]"></i>
                      <span id="web-preview">${data.website}</span>
                  </a>
              </li>
              <li class="group hover:translate-x-1 duration-200">
                  <a href=""
                      class="flex items-center gap-2 text-gray-950 hover:text-blue-500 duration-300">
                      <i class="bx bxl-facebook text-[1.3rem]"></i>
                      <span id="fb-preview">${data.facebook}</span>
                  </a>
              </li>
              <li class="group hover:translate-x-1 duration-200">
                  <a href=""
                      class="flex items-center gap-2 text-gray-950 hover:text-blue-500 duration-300">
                      <i class="bx bxl-twitter text-[1.3rem]"></i>
                      <span id="twitter-preview">${data.twitter}</span>
                  </a>
              </li>
              <li class="group hover:translate-x-1 duration-200">
                  <a href=""
                      class="flex items-center gap-2 text-gray-950 hover:text-blue-500 duration-300">
                      <i class="bx bxl-instagram-alt text-[1.3rem]"></i>
                      <span id="insta-preview">${data.instagram}</span>
                  </a>
              </li>
          </ul>
      </section>
      <section class="mb-4 px-5 py-3 border-t-2">
          <div class="font-medium">Note :</div>
          <div class="text-gray-500" id="note-preview">
              ${data.note}
          </div>
      </section>`;
};

/**
 * receipt items
 */
const receiptItem = (items) => {
  return items
    .map(({ name, amount, variant, modifier, price, price_cut }) => {
      return `
        <li>
            <div class="flex justify-between">
                <div class="text-left font-medium">${name}</div>
                <div class="text-center font-medium">X${amount}</div>
                <div class="text-right font-medium">${price}</div>
            </div>
            <div class="text-gray-600">${variant}</div>
            <ul>
                ${modifier.map((m) => `<li>${m}</li>`).join('')}
            </ul>
            <ul class="p-0">
                ${price_cut
                  .map(({ name, amount }) => {
                    return `
                    <li class="flex justify-between">
                        <div class="text-gray-600 text-left">${name}</div>
                        <div class="text-gray-600 text-right">- ${amount}</div>
                    </li>
                    `;
                  })
                  .join('')}
            </ul>
        </li>
        `;
    })
    .join('');
};

/**
 * receipt info
 */
const receiptInfo = (data) => {
  return `<section class="mb-4 px-5">
          <div class="flex justify-between mb-2">
              <div class="text-left font-medium">Tanggal</div>
              <div class="text-right font-medium">${data.date}</div>
          </div>
          <div class="flex justify-between mb-2">
              <div class="text-left font-medium">Receipt Number</div>
              <div class="text-right font-medium">${data.receipt_number}</div>
          </div>
          <div class="flex justify-between mb-2">
              <div class="text-left font-medium">Customer Name</div>
              <div class="text-right font-medium">${data.customer_name}</div>
          </div>
          <div class="flex justify-between mb-2">
              <div class="text-left font-medium">Served By</div>
              <div class="text-right font-medium">${data.served_by}</div>
          </div>
          <div class="flex justify-between mb-2">
              <div class="text-left font-medium">Collected By</div>
              <div class="text-right font-medium">${data.collected_by}</div>
          </div>
      </section>
      <section class="border-y-2 w-full px-5 mb-4">
          <h5 class="pt-3 pb-2 text-center">${data.sales_type}</h5>
      </section>`;
};

/**
 * receipt amount
 */
const receiptAmount = (data) => {
  // uncomment this after api ready
  //   return `<section class="mb-4 px-5 border-y-2">
  //           <div class="flex justify-between mb-2 pt-3">
  //               <div class="text-left font-medium">Subtotal</div>
  //               <div class="text-right font-medium">${subtotal}</div>
  //           </div>
  //           ${tax_gratuity
  //             .map(({ name, amount }) => {
  //               return `
  //                   <div class="flex justify-between mb-2">
  //                       <div class="text-left font-medium">${name}</div>
  //                       <div class="text-right font-medium">${amount}</div>
  //                   </div>
  //               `;
  //             })
  //             .join('')}
  //       </section>`;
};

/**
 * receipt total
 */
const receiptTotal = (data) => {
  return `<section class="mb-4 px-5">
          <div class="flex justify-between mb-2">
              <h4 class="text-left">Total</h4>
              <h4 class="text-right">${data.total}</h4>
          </div>
          <div class="flex justify-between mb-2">
              <div class="text-left font-medium">${data.type}</div>
              <div class="text-right font-medium">${data.amount}</div>
          </div>
          <div class="flex justify-between mb-2">
              <div class="text-left font-medium">Change</div>
              <div class="text-right font-medium">${data.change}</div>
          </div>
      </section>`;
};

/**
 * render receipt
 */
const renderReceipt = (data) => {
  const header = receiptHeader(data.header);
  const info = receiptInfo(data.info);
  const item = `<section class="mb-4 px-5">
                    ${receiptItem(data.item)}
                </section>`;
  const amount = receiptAmount(data.amount);
  const total = receiptTotal(data.total);
  const footer = receiptFooter(data.footer);

  return [header, info, item, amount, total, footer];
};

export { renderReceipt };
