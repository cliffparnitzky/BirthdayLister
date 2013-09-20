<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package BirthdayLister
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'ModuleBirthdayLister'      => 'system/modules/BirthdayLister/ModuleBirthdayLister.php',
	'ModuleBirthdayListerHooks' => 'system/modules/BirthdayLister/ModuleBirthdayListerHooks.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_birthdaylister' => 'system/modules/BirthdayLister/templates',
));
