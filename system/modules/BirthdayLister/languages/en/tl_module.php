<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2014 Leo Feyer
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
 * @copyright  Cliff Parnitzky 2013-2014
 * @author     Cliff Parnitzky
 * @package    BirthdayLister
 * @license    LGPL
 */

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_module']['phrase'] = array('Phrase', 'Select a phrase, that will be used for the link text.');

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriod']                      = array('Period', 'Select the period, for which birthdays should be listed.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriodCustomStart']           = array('Start before the current day', 'Select the start before the current day, from which birthdays should be listed.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriodCustomEnd']             = array('End after the current day', 'Select the end after the current day, till which birthdays should be listed.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriodCustomCrossYearLimits'] = array('Cross year limits', 'Select if the year limits should be crossed. If this option is not selected, the period is only applied to the current year (cutted on 01.01. and 31.12.).');
$GLOBALS['TL_LANG']['tl_module']['birthdayListMemberGroups']                = array('Member groups', 'Select the member groups, for which birthdays should be listed.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListDateFormat']                  = array('Date format', 'Select the date format to be used in list. The date format string will be parsed with the PHP date() function.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListShowInactiveMembers']         = array('Show inactive members', 'Select if birthdays of inactive members should be listed.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListTemplate']                    = array('List template', 'Select the list template.');

/**
 * Periods
 */
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['all']              = array('All', 'Displays all birthdays.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['current_day']      = array('Current day', 'Displays all birthdays at the current day.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['period']           = 'Period';
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['current_week']     = array('Current week', 'Displays all birthdays in the current week.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['current_month']    = array('Current month', 'Displays all birthdays in the current month.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['current_quarter']  = array('Current quarter', 'Displays all birthdays in the current quarter.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['current_halfyear'] = array('Current half-year', 'Displays all birthdays in the current half-year.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['custom_period']    = array('Custom period', 'Displays all birthdays in a custom period.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['month']            = 'Month';
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['january']          = array($GLOBALS['TL_LANG']['MONTHS']['0'], 'Displays all birthdays in ' . strtolower($GLOBALS['TL_LANG']['MONTHS']['0']) . '.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['february']         = array($GLOBALS['TL_LANG']['MONTHS']['1'], 'Displays all birthdays in ' . strtolower($GLOBALS['TL_LANG']['MONTHS']['1']) . '.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['march']            = array($GLOBALS['TL_LANG']['MONTHS']['2'], 'Displays all birthdays in ' . strtolower($GLOBALS['TL_LANG']['MONTHS']['2']) . '.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['april']            = array($GLOBALS['TL_LANG']['MONTHS']['3'], 'Displays all birthdays in ' . strtolower($GLOBALS['TL_LANG']['MONTHS']['3']) . '.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['may']              = array($GLOBALS['TL_LANG']['MONTHS']['4'], 'Displays all birthdays in ' . strtolower($GLOBALS['TL_LANG']['MONTHS']['4']) . '.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['june']             = array($GLOBALS['TL_LANG']['MONTHS']['5'], 'Displays all birthdays in ' . strtolower($GLOBALS['TL_LANG']['MONTHS']['5']) . '.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['july']             = array($GLOBALS['TL_LANG']['MONTHS']['6'], 'Displays all birthdays in ' . strtolower($GLOBALS['TL_LANG']['MONTHS']['6']) . '.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['august']           = array($GLOBALS['TL_LANG']['MONTHS']['7'], 'Displays all birthdays in ' . strtolower($GLOBALS['TL_LANG']['MONTHS']['7']) . '.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['september']        = array($GLOBALS['TL_LANG']['MONTHS']['8'], 'Displays all birthdays in ' . strtolower($GLOBALS['TL_LANG']['MONTHS']['8']) . '.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['october']          = array($GLOBALS['TL_LANG']['MONTHS']['9'], 'Displays all birthdays in ' . strtolower($GLOBALS['TL_LANG']['MONTHS']['9']) . '.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['november']         = array($GLOBALS['TL_LANG']['MONTHS']['10'], 'Displays all birthdays in ' . strtolower($GLOBALS['TL_LANG']['MONTHS']['10']) . '.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['december']         = array($GLOBALS['TL_LANG']['MONTHS']['11'], 'Displays all birthdays in ' . strtolower($GLOBALS['TL_LANG']['MONTHS']['11']) . '.');

/**
 * Units
 */
$GLOBALS['TL_LANG']['tl_module']['timeunits']['day']   = array('Day(s)', 'Select time in days.');
$GLOBALS['TL_LANG']['tl_module']['timeunits']['week']  = array('Week(s)', 'Select time in weeks. In the calculation 1 week is converted into 7 days.');
$GLOBALS['TL_LANG']['tl_module']['timeunits']['month'] = array('Month(s)', 'Select time in months. In the calculation 1 month is converted into 30 days.');

?>