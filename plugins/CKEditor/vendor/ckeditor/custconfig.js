﻿/*
help: http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html
*/

CKEDITOR.editorConfig = function( config )
{
	config.disableNativeSpellChecker = false;
	config.toolbar_Simple =
	[
		{ name: 'document',    items : [ 'Maximize','Source','Cut','Copy','PasteText','PasteFromWord','Undo','Redo' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline' ] },
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','JustifyLeft','JustifyCenter','JustifyRight' ] }
	];
	config.toolbar_Standard =
	[
		{ name: 'document',    items : [ 'Maximize','Source' ] },
		{ name: 'editing',    items : [ 'Cut','Copy','SelectAll','PasteText','PasteFromWord','RemoveFormat' ] },
		{ name: 'tools',     items : [ 'Find','Replace','SpellChecker', 'Scayt' ] },
		{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',      items : [ 'Image','Table','HorizontalRule','Smiley','SpecialChar' ] },
		'/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript' ] },
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','Outdent','Indent','Blockquote','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
		{ name: 'styles',      items : [ 'Font','FontSize' ] },
		{ name: 'colors',      items : [ 'TextColor','BGColor' ] }
	];
	config.toolbar_adminbar =
	[
		{ name: 'document',    items : [ 'Maximize','Source','ShowBlocks','DocProps','Preview' ] },
		{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','RemoveFormat','Undo','Redo' ] },
		{ name: 'editing',     items : [ 'Find','Replace','SelectAll','SpellChecker', 'Scayt' ] },
		{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',      items : [ 'Image','Flash','oembed','MediaEmbed','Table','HorizontalRule','Smiley','SpecialChar','PageBreak' ] },
		'/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript' ] },
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','Outdent','Indent','Blockquote','CreateDiv','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
		{ name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] },
		{ name: 'colors',      items : [ 'TextColor','BGColor' ] }
	];
	config.toolbar_userbar1 =
	[
		{ name: 'document',    items : [ 'Maximize','Source','ShowBlocks','Preview' ] },
		{ name: 'clipboard',   items : [ 'Cut','Copy','PasteText','PasteFromWord','RemoveFormat','Undo','Redo' ] },
		{ name: 'editing',     items : [ 'Find','Replace' ] },
		{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',      items : [ 'Image','Flash','oembed','MediaEmbed','Table','HorizontalRule','Smiley','SpecialChar' ] },
		'/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript' ] },
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','Outdent','Indent','Blockquote','CreateDiv','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
		{ name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] },
		{ name: 'colors',      items : [ 'TextColor','BGColor' ] }
	];
	config.toolbar_userbar2 =
	[
		{ name: 'document',    items : [ 'Maximize','Source','Cut','Copy','PasteText','PasteFromWord','RemoveFormat','Link' ] },
		{ name: 'insert',      items : [ 'Image','Table','Smiley','SpecialChar' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript' ] },
		{ name: 'paragraph',   items : [ 'JustifyLeft','JustifyCenter','JustifyRight' ] },
		{ name: 'colors',      items : [ 'TextColor','BGColor' ] }
	];
};
