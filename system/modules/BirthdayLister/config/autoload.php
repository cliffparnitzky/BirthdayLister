<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package BirthdayLister
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'BirthdayLister',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'BirthdayLister\BirthdayListerHooks'  => 'system/modules/BirthdayLister/classes/BirthdayListerHooks.php',

	// Modules
	'BirthdayLister\ModuleBirthdayLister' => 'system/modules/BirthdayLister/modules/ModuleBirthdayLister.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_birthdaylister' => 'system/modules/BirthdayLister/templates/modules',
));
