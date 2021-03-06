<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2015 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2013-2015
 * @author     Cliff Parnitzky
 * @package    BirthdayLister
 * @license    LGPL
 */

/**
 * Add palettes and subpallets to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'birthdayListPeriod'; 
$GLOBALS['TL_DCA']['tl_module']['palettes']['birthdayLister'] = '{title_legend},name,headline,type;{config_legend},birthdayListPeriod,birthdayListMemberGroups,birthdayListDateFormat,birthdayListShowInactiveMembers;{template_legend:hide},birthdayListTemplate;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['birthdayListPeriod_custom_period'] = 'birthdayListPeriodCustomStart,birthdayListPeriodCustomEnd,birthdayListPeriodCustomCrossYearLimits';  

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['birthdayListPeriod'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriod'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('all' => 'all', 'current_day' => 'current_day',
	                                   'period' => array('current_week', 'current_month', 'current_quarter', 'current_halfyear', 'custom_period'),
	                                   'month' => array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december')
	                                  ),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods'],
	'eval'                    => array('mandatory'=>true, 'submitOnChange'=>true, 'includeBlankOption' => true, 'helpwizard' => true),
	'sql'                     => "varchar(20) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['birthdayListPeriodCustomStart'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriodCustomStart'],
	'exclude'                 => true,
	'inputType'               => 'inputUnit',
	'options'                 => array('day', 'week', 'month'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module']['timeunits'],
	'eval'                    => array('mandatory'=>true, 'rgxp' => 'digit', 'tl_class'=>'clr w50', 'maxlength' => 2, 'helpwizard' => true),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['birthdayListPeriodCustomEnd'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriodCustomEnd'],
	'exclude'                 => true,
	'inputType'               => 'inputUnit',
	'options'                 => array('day', 'week', 'month'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module']['timeunits'],
	'eval'                    => array('mandatory'=>true, 'rgxp' => 'digit', 'maxlength' => 2, 'helpwizard' => true),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['birthdayListPeriodCustomCrossYearLimits'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriodCustomCrossYearLimits'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['birthdayListMemberGroups'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['birthdayListMemberGroups'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'foreignKey'              => 'tl_member_group.name',
	'eval'                    => array('mandatory'=>true, 'multiple' => true, 'tl_class'=>'clr'),
	'sql'                     => "blob NOT NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['birthdayListDateFormat'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['birthdayListDateFormat'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50', 'maxlength' => 64),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['birthdayListShowInactiveMembers'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['birthdayListShowInactiveMembers'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['birthdayListTemplate'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['birthdayListTemplate'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_BirthdayLister', 'getBirthdayListTemplates'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

/**
 * Class tl_module_BirthdayLister
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Cliff Parnitzky 2013-2015
 * @author     Cliff Parnitzky
 * @package    BirthdayLister
 */
class tl_module_BirthdayLister extends \Backend
{
	/**
	 * Return all birthday lister templates as array
	 * @return array
	 */
	public function getBirthdayListTemplates()
	{
		return $this->getTemplateGroup('mod_birthdaylister');
	}
}

?>