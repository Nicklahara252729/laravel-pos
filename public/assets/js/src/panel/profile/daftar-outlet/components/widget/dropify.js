/**
 * set dropify
 */
const setDropify = (classAttribute) => {
  $(classAttribute).dropify({
    messages: {
      default: 'Drag and drop foto disini atau click',
      replace: 'Drag and drop atau click untuk merubah',
      remove: 'Hapus',
      error: 'Ooops, Ada masalah terjadi.',
    },
    tpl: {
      message:
        '<div class="dropify-message"><span class="file-icon" /> <p class="text-sm">{{ default }}</p></div>',
      preview:
        '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
    },
  });
};

export { setDropify };
