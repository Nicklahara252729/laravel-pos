/**
 *  transaction table element
 */
const notificationElement = (tableData) => {
  const { rows, date } = tableData;
  const rowsElement = rows.map((row) => tableRowElement(row)).join('');
  return `
    <div>
      <h6 class="text-muted text-uppercase mb-3">${date}</h6>
      ${rowsElement}
    </div>
  `;
};

/**
 * row table
 */
const tableRowElement = (rowData) => {
  const { title, description, time, module, link } = rowData;
  const icon = notificationRenderIcon(module);
  return `
    <div class="mb-2">
                        <div class="message-list mb-0 p-1">
                            <div class="list">
                                <div class="col-mail mt-2 ml-2">
                                    <div class="d-flex title align-items-center">
                                        <div class="flex-shrink-0 avatar-sm me-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-18">
                                                <i class="bx ${icon}"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1 ms-2 ps-1">
                                            <h5 class="font-size-14 mb-0"><a href="${link}" class="text-body">${title}</a></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-mail col-mail-2">
                                    <a href="${link}" class="subject text-body">${description}</span>
                                    </a>
                                    <div class="date"><i class="mdi mdi-clock me-2 font-size-15 align-middle"></i>
                                        ${time}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    `;
};

export { notificationElement };
