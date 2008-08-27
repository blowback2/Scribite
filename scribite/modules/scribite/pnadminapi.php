<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 *
 * @package scribite!
 * @license http://www.gnu.org/copyleft/gpl.html
 *
 * @author sven schomacker
 * @version $Id$
 */

// update module editor
function scribite_adminapi_updateeditor($args)
{
	if (!SecurityUtil::checkPermission( 'scribite::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	// Argument check
	if (!isset($args['modname']) ||
		!isset($args['modeditor'])) {
		return LogUtil::registerError (_MODARGSERROR);
	}

	// Get the existing module
	$modname = $args['modname'];
	$pntable = pnDBGetTables();
	$scribitecolumn = $pntable['scribite_column'];
	$where = "$scribitecolumn[modname] = '$modname'";
	$item = DBUtil::selectObjectArray('scribite', $where);

	// update item
	$newitem = array('mid'       => $item[0]['mid'],
			 'modname'   => $args['modname'],
			 'modfuncs'  => $item[0]['modfuncs'],
			 'modareas'  => $item[0]['modareas'],
			 'modeditor' => $args['modeditor']);

	if (!DBUtil::updateObject($newitem, 'scribite', '', 'mid')) {
		return LogUtil::registerError (_EDITORNOCONFCHANGE);
	}

	return true;
}

// add module config
function scribite_adminapi_addmodule($args)
{
	if (!SecurityUtil::checkPermission( 'scribite::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	// Argument check
	if (!isset($args['modname']) || !isset($args['modfuncs']) || !isset($args['modareas']) || !isset($args['modeditor'])) {
		return LogUtil::registerError (_MODARGSERROR);
	}

	$args['modfuncs'] = serialize(explode(',', $args['modfuncs']));
	$args['modareas'] = serialize(explode(',', $args['modareas']));

	// add item
	$item = array('modname'   => $args['modname'],
			'modfuncs'  => $args['modfuncs'],
			'modareas'  => $args['modareas'],
			'modeditor' => $args['modeditor']);

	if (!DBUtil::insertObject($item, 'scribite', false, 'mid')) {
		return LogUtil::registerError (_EDITORNOCONFCHANGE);
	}
	return true;
}

// update module config
function scribite_adminapi_editmodule($args)
{
	if (!SecurityUtil::checkPermission( 'scribite::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Argument check
	if (!isset($args['modulename']) || !isset($args['modfuncs']) || !isset($args['modareas'])  || !isset($args['modeditor'])) {
		return LogUtil::registerError (_MODARGSERROR);
	}

	// check for existing module
	$modulename = $args['modulename'];
	$pntable = pnDBGetTables();
	$scribitecolumn = $pntable['scribite_column'];
	$where = "$scribitecolumn[modname] = '$modulename'";
	$item = DBUtil::selectObjectArray('scribite', $where);

	$args['modfuncs'] = serialize(explode(',', $args['modfuncs']));
	$args['modareas'] = serialize(explode(',', $args['modareas']));

	$newitem = array('mid'       => $item[0]['mid'],
			'modname'   => $args['modulename'],
			'modfuncs'  => $args['modfuncs'],
			'modareas'  => $args['modareas'],
			'modeditor' => $args['modeditor']);

	if (!DBUtil::updateObject($newitem, 'scribite', '', 'mid')) {
		return LogUtil::registerError (_EDITORNOCONFCHANGE);
	}
	return true;
}


// del module config
function scribite_adminapi_delmodule($args)
{
	if (!SecurityUtil::checkPermission( 'scribite::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	// Argument check
	if (!isset($args['modulename'])) {
		return LogUtil::registerError (_MODARGSERROR);
	}

	// check for existing module
	$pntable = pnDBGetTables();
	$scribitecolumn = $pntable['scribite_column'];
	$where = "$scribitecolumn[modname] = '".$args['modulename']."'";
	$item = DBUtil::selectObjectArray('scribite', $where);

	if (!DBUtil::deleteObjectById('scribite', $item[0]['mid'], 'mid')) {
		return LogUtil::registerError (_EDITORNOCONFCHANGE);
	}
	return true;
}

// read plugin-folder from xinha and load names into array
function scribite_adminapi_getxinhaPlugins($args)
{
	$path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
	$plugins = array();
	$pluginsdir = opendir($path . '/xinha/plugins');
	while (false !== ($f = readdir($pluginsdir))) {
		if ($f != '.' && $f != '..' && $f != 'CVS' && !ereg('[.]', $f)) {
			$plugins[$f] = $f;
		}
	}
	closedir($pluginsdir);
	asort($plugins);
	return $plugins;
}

// read skins-folder from xinha and load names into array
function scribite_adminapi_getxinhaSkins($args)
{
	$path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
	$skins = array();
	$skinsdir = opendir($path . '/xinha/skins');
	while (false !== ($f = readdir($skinsdir))) {
		if ($f != '.' && $f != '..' && $f != 'CVS' && !ereg('[.]', $f)) {
			$skins[$f] = $f;
		}
	}
	closedir($skinsdir);
	asort($skins);
	return $skins;
}

// read lang-folder from xinha and load names into array
function scribite_adminapi_getxinhaLangs($args)
{
	$path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
	$langs = array();
	$langsdir = opendir($path . '/xinha/lang');
	while (false !== ($f = readdir($langsdir))) {
		if ($f != '.' && $f != '..' && $f != 'CVS' && ereg('[.js]', $f)) {
			$f = str_replace('.js', '', $f);
			$langs[$f] = $f;
		}
	}
	closedir($langsdir);
	// Add english as default editor language - this not exists as file in xinha
	$langs['en'] = 'en';
	asort($langs);
	return $langs;
}

// read langs-folder from tiny_mce and load names into array
function scribite_adminapi_gettinymceLangs($args)
{
	$path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
	$langs = array();
	$langsdir = opendir($path . '/tiny_mce/langs');
	while (false !== ($f = readdir($langsdir))) {
		if ($f != '.' && $f != '..' && $f != 'CVS' && ereg('[.js]', $f)) {
			$f = str_replace('.js', '', $f);
			$langs[$f] = $f;
		}
	}
	closedir($langsdir);
	asort($langs);
	return $langs;
}
// read themes-folder from tiny_mce and load names into array
function scribite_adminapi_gettinymceThemes($args)
{
	$path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
	$themes = array();
	$themesdir = opendir($path . '/tiny_mce/themes');
	while (false !== ($f = readdir($themesdir))) {
		if ($f != '.' && $f != '..' && $f != 'CVS' && !ereg('[.]', $f)) {
			$themes[$f] = $f;
		}
	}
	closedir($themesdir);
	asort($themes);
	return $themes;
}
// read plugins from tiny_mce and load names into array
function scribite_adminapi_gettinymcePlugins($args)
{
	$path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
	$plugins = array();
	$pluginsdir = opendir($path . '/tiny_mce/plugins');
	while (false !== ($f = readdir($pluginsdir))) {
		if ($f != '.' && $f != '..' && $f != 'CVS' && $f != '_template' && !ereg('[.]', $f)) {
			$plugins[$f] = $f;
		}
	}
	closedir($pluginsdir);
	asort($plugins);
	return $plugins;
}
// read langs-folder from fckeditor and load names into array
function scribite_adminapi_getfckeditorLangs($args)
{
	$path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
	$langs = array();
	$langsdir = opendir($path . '/fckeditor/editor/lang');
	while (false !== ($f = readdir($langsdir))) {
		if ($f != '.' && $f != '..' && $f != 'CVS' && !ereg('[_]', $f)  && ereg('[.js]', $f)) {
			$f = str_replace('.js', '', $f);
			$langs[$f] = $f;
		}
	}
	closedir($langsdir);
	asort($langs);
	return $langs;
}
// read skins-folder from fckeditor and load names into array
function scribite_adminapi_getfckeditorSkins($args)
{
	$path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
	$skins = array();
	$skinsdir = opendir($path . '/fckeditor/editor/skins');
	while (false !== ($f = readdir($skinsdir))) {
		if ($f != '.' && $f != '..' && $f != 'CVS' && !ereg('[.]', $f)) {
			$skins[$f] = $f;
		}
	}
	closedir($skinsdir);
	asort($skins);
	return $skins;
}
// read plugins from fckeditor and load names into array
function scribite_adminapi_getfckeditorPlugins($args)
{
	$path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
	$plugins = array();
	$pluginsdir = opendir($path . '/fckeditor/editor/plugins');
	while (false !== ($f = readdir($pluginsdir))) {
		if ($f != '.' && $f != '..' && $f != 'CVS' && !ereg('[.]', $f)) {
			$plugins[$f] = $f;
		}
	}
	closedir($pluginsdir);
	asort($plugins);
	return $plugins;
}
// load names into array
function scribite_adminapi_getfckeditorBarmodes($args)
{
    $barmodes = array();
    $barmodes['Default'] = 'Default';
    $barmodes['Basic']   = 'Basic';
    return $barmodes;
}

// get available admin panel links
function scribite_adminapi_getlinks($args)
{
	$links = array();
	$links[] = array('url' => pnModURL('scribite', 'admin', 'modifyconfig'), 'text' => _MODIFYCONFIG);

	// check for all supported editors and generate links
	if (pnModAPIFunc('scribite', 'user', 'getEditors', array('editorname' => 'xinha'))) {
		$links[] = array('url' => pnModURL('scribite', 'admin', 'modifyxinha'), 'text' => _XINHASETTINGS);
	}
	if (pnModAPIFunc('scribite', 'user', 'getEditors', array('editorname' => 'tiny_mce'))) {
		$links[] = array('url' => pnModURL('scribite', 'admin', 'modifytinymce'), 'text' => _TINYMCESETTINGS);
	}
	if (pnModAPIFunc('scribite', 'user', 'getEditors', array('editorname' => 'fckeditor'))) {
		$links[] = array('url' => pnModURL('scribite', 'admin', 'modifyfckeditor'), 'text' => _FCKEDITORSETTINGS);
	}
	if (pnModAPIFunc('scribite', 'user', 'getEditors', array('editorname' => 'openwysiwyg'))) {
		$links[] = array('url' => pnModURL('scribite', 'admin', 'modifyopenwysiwyg'), 'text' => _OPENWYSIWYGSETTINGS);
	}
	if (pnModAPIFunc('scribite', 'user', 'getEditors', array('editorname' => 'nicedit'))) {
		$links[] = array('url' => pnModURL('scribite', 'admin', 'modifynicedit'), 'text' => _NICEDITORSETTINGS);
	}

	return $links;
}

