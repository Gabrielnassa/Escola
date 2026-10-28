/* Bambu Caderno: formatos de texto no editor de blocos.
   - "Linha magenta": sublinha uma palavra com a linha do logo que termina numa nota.
   - "[PREENCHER]": destaca em amarelo um texto que ainda falta completar. */

(function (wp) {
  "use strict";
  var el = wp.element.createElement;
  var rt = wp.richText;
  var BotaoFormato = wp.blockEditor.RichTextToolbarButton;

  function registrar(nome, titulo, classe, icone) {
    rt.registerFormatType(nome, {
      title: titulo,
      tagName: "span",
      className: classe,
      edit: function (props) {
        return el(BotaoFormato, {
          icon: icone,
          title: titulo,
          isActive: props.isActive,
          onClick: function () {
            props.onChange(rt.toggleFormat(props.value, { type: nome }));
          }
        });
      }
    });
  }

  registrar("bambu/nota-linha", "Linha magenta", "nota-linha", "editor-underline");
  registrar("bambu/preencher", "Marcar como [PREENCHER]", "preencher", "warning");
})(window.wp);
