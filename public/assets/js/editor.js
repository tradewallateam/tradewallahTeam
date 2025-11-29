
new FroalaEditor("#editor", {

    height: 500,

    toolbarButtons: [
        'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript',
        'fontFamily', 'fontSize', 'textColor', 'backgroundColor',
        'inlineClass', 'inlineStyle', 'clearFormatting',

        'paragraphFormat', 'paragraphStyle', 'lineHeight',
        'align', 'formatOL', 'formatUL', 'outdent', 'indent',

        'quote', 'insertLink', 'insertImage', 'insertVideo',
        'insertFile', 'insertTable', 'insertHR',

        'undo', 'redo', 'emoticons', 'specialCharacters',
        'insertCode', 'fullscreen', 'print', 'help'
    ],

    pluginsEnabled: [
        'align', 'charCounter', 'codeView', 'colors', 'draggable', 'emoticons',
        'entities', 'file', 'fontFamily', 'fontSize', 'fullscreen', 'help',
        'image', 'imageManager', 'inlineClass', 'inlineStyle', 'lineHeight',
        'link', 'lists', 'paragraphFormat', 'paragraphStyle', 'print',
        'quickInsert', 'quote', 'specialCharacters', 'table', 'url',
        'wordCounter', 'video'
    ],

    events: {
        initialized: function () {

            // === Full wrapper ===
            this.$box[0].style.background = "#000";
            this.$box[0].style.border = "1px solid #222";

            // === Toolbar ===
            const toolbar = this.$tb[0];
            if (toolbar) {
                toolbar.style.background = "#000";
                toolbar.style.borderBottom = "1px solid #222";

                toolbar.querySelectorAll(".fr-command, .fr-dropdown, i, svg").forEach(el => {
                    el.style.color = "#fff";
                    el.style.fill = "#fff";
                });
            }

            // === Typing area ===
            this.el.style.background = "#000";
            this.el.style.color = "#fff";

            // === Footer fix (runs after render) ===
            setTimeout(() => {
                const footer = this.$box[0].querySelector(".fr-footer");
                if (footer) {
                    footer.style.background = "#000";
                    footer.style.borderTop = "1px solid #222";

                    footer.querySelectorAll("*").forEach(el => {
                        el.style.color = "#fff";
                        el.style.fill = "#fff";
                    });
                }
            }, 50);
        }
    }
});