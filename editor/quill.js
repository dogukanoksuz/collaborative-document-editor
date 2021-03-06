import * as Y from 'yjs'
import {
  WebsocketProvider
} from 'y-websocket'
import {
  QuillBinding
} from 'y-quill'
import Quill from 'quill'
import QuillCursors from 'quill-cursors'
import tippy from 'tippy.js';
import * as QuillTableUI from 'quill-table-ui'
import MagicUrl from 'quill-magic-url'
import { ImageDrop } from 'quill-image-drop-module'
import BlotFormatter from 'quill-blot-formatter'

Quill.register('modules/blotFormatter', BlotFormatter)
Quill.register('modules/imageDrop', ImageDrop)
Quill.register('modules/magicUrl', MagicUrl);
Quill.register('modules/cursors', QuillCursors)
Quill.register({
  'modules/tableUI': QuillTableUI.default
}, true)

window.addEventListener('load', () => {
  const ydoc = new Y.Doc()
  var provider = new WebsocketProvider('ws://localhost:9000', documentUUID, ydoc)
  const type = ydoc.getText(documentUUID)

  let editor = new Quill('#full-container .editor', {
    bounds: '#full-container .editor',
    modules: {
      'cursors': true,
      'syntax': true,
      'toolbar': { container: '.toolbar' },
      'table': true,
      'tableUI': true,
      'magicUrl': true,
      'imageDrop': true,
      'blotFormatter': {}
    },

    theme: 'snow'
  });

  editorInstance = editor
  providerInstance = provider

  const binding = new QuillBinding(type, editor, provider.awareness)

  provider.awareness.setLocalStateField('user', {
    name: divergent_name,
    color: divergent_color,
    avatar: divergent_avatar
  })

  tippy('.ql-bold', {
    content: 'Kalın'
  })
  tippy('.ql-italic', {
    content: 'Eğik'
  })
  tippy('.ql-underline', {
    content: 'Altı Çizili'
  })
  tippy('.ql-strike', {
    content: 'Üstü Çizili'
  })
  tippy('.ql-blockquote', {
    content: 'Alıntı'
  })
  tippy('.ql-code-block', {
    content: 'Kod Bloğu'
  })
  tippy('[value="ordered"]', {
    content: 'Sıralı Liste'
  })
  tippy('[value="bullet"]', {
    content: 'Liste'
  })
  tippy('[value="+1"]', {
    content: 'İçe Adım'
  })
  tippy('[value="-1"]', {
    content: 'Dışa Adım'
  })
  tippy('.ql-link', {
    content: 'Link'
  })
  tippy('.ql-image', {
    content: 'Resim'
  })
  tippy('.ql-clean', {
    content: 'Biçimlendirmeyi Temizle'
  })
  tippy('.download-pdf', {
    content: 'PDF Olarak Kaydet'
  })

  // Auto-save AJAX
  let save = () => {
    $.ajax(saveRoute, {
      type: 'POST',
      data: {
        '_token': csrfToken,
        'data': $(".ql-editor").html()
      },
      success: function (data, status, xhr) {
        console.log('status: ' + status + ', data: ' + data);
      },
      error: function (jqXhr, textStatus, errorMessage) {
        clearInterval(saveLoop);
        console.log('Error' + errorMessage);
      }
    })
  }

  let saveLoop = setInterval(() => {
    save()
  }, 9999999)

  let checker = false;

  $(".editor").keypress(function () {
    if (!checker) {
      clearInterval(saveLoop)
      saveLoop = setInterval(() => {
        save()
      }, 8000)
      checker = true
    }

  })
})

