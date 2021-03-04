/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
    CKEDITOR.dtd.$removeEmpty['i'] = 0;
    CKEDITOR.dtd.$removeEmpty['span'] = 0;
    CKEDITOR.dtd['a']['h1'] = 1;
    CKEDITOR.dtd['a']['h2'] = 1;
    CKEDITOR.dtd['a']['h3'] = 1;
    CKEDITOR.dtd['a']['h4'] = 1;
    CKEDITOR.dtd['a']['h5'] = 1;
    CKEDITOR.dtd['a']['h6'] = 1;

    config.width = '100%';
    config.toolbar = [
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Preview', '-', 'Templates' ] },
        { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
        { name: 'clipboard', groups: [ 'undo', 'clipboard', 'cleanup' ], items: [ 'Undo', 'Redo', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'CopyFormatting', 'RemoveFormat' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'bidi' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'BidiLtr', 'BidiRtl' ] },
        '/',
        { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        { name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
        '/',
        { name: 'links', items: [ 'Link', 'Unlink' ] },
        { name: 'insert', items: [ 'Blockquote', 'CreateDiv', '-', 'Image', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak', 'Iframe' ] },
        { name: 'others', items: [ '-' ] }
    ];
    config.allowedContent = true;
    config.disallowedContent = 'html head body meta style script noscript basefont center s strike u font dir applet; *[on*]';
    config.coreStyles_strike = {element: 'span', styles: { 'text-decoration': 'line-through' }, overrides: 'strike'};
    config.coreStyles_underline = {element: 'span', styles: { 'text-decoration': 'underline' }, overrides: 'u'};

    config.format_tags = 'p;div;h2;h3;h4;h5;h6';
    config.font_names =
        '微軟正黑體/Arial, Helvetica, Microsoft JhengHei, sans-serif;' +
        '新細明體/Times New Roman, Times, PMingLiU, serif;' +
        'Georgia/Georgia, serif;' +
        'Verdana/Verdana, Geneva, sans-serif';
    config.fontSize_sizes = '10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;26/26px;28/28px;36/36px';
};
