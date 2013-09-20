<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2013 Leo Feyer
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
 * @copyright  Cliff Parnitzky 2013
 * @author     Cliff Parnitzky
 * @package    BirthdayLister
 * @license    LGPL
 */

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriod']                      = array('Zeitraum', 'Wählen Sie den Zeitraum aus, für die Geburtstage angezeigt werden sollen.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriodCustomStart']           = array('Start vor dem aktuellen Tag', 'Wählen Sie den Start vor dem aktuellen Tag aus, ab dem Geburtstage angezeigt werden sollen.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriodCustomEnd']             = array('Ende nach dem aktuellen Tag', 'Wählen Sie das Ende nach dem aktuellen Tag aus, bis zu dem Geburtstage angezeigt werden sollen.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriodCustomCrossYearLimits'] = array('Jahresgrenzen überschreiten', 'Wählen Sie ob die Jahresgrenzen überschritten werden sollen. Ist die Option nicht gewählt, wird der Zeitraum nur auf das aktuelle Jahr angewendet (am 01.01. und 31.12. abgeschnitten).');
$GLOBALS['TL_LANG']['tl_module']['birthdayListMemberGroups']                = array('Mitgliedergruppen', 'Wählen Sie die Mitgliedergruppen aus, für die Geburtstage angezeigt werden sollen.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListDateFormat']                  = array('Datumsformat', 'Wählen Sie das Datumsformat aus, dass in der Liste verwendet werden soll. Der Datumsformat-String wird mit der PHP-Funktion date() geparst.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListShowInactiveMembers']         = array('Inaktive Mitglieder anzeigen', 'Wählen Sie ob Geburtstage für inaktive Mitglieder angezeigt werden sollen.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListTemplate']                    = array('Listentemplate', 'Wählen Sie das Listentemplate aus.');

/**
 * Periods
 */
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['all']              = array('Alle', 'Zeigt alle Geburtstage an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['current_day']      = array('Aktueller Tag', 'Zeigt alle Geburtstage am aktuellen Tag an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['period']           = 'Zeitraum';
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['current_week']     = array('Aktuelle Woche', 'Zeigt alle Geburtstage in der aktuellen Woche an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['current_month']    = array('Aktueller Monat', 'Zeigt alle Geburtstage im aktuellen Monat an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['current_quarter']  = array('Aktuelles Quartal', 'Zeigt alle Geburtstage im aktuellen Quartal an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['current_halfyear'] = array('Aktuelles Halbjahr', 'Zeigt alle Geburtstage im aktuellen Halbjahr an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['custom_period']    = array('Benutzerdefinierter Zeitraum', 'Zeigt alle Geburtstage in einem benutzerdefinierter Zeitraum an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['month']            = 'Monat';
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['january']          = array($GLOBALS['TL_LANG']['MONTHS']['0'], 'Zeigt alle Geburtstage im ' . $GLOBALS['TL_LANG']['MONTHS']['0'] . ' an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['february']         = array($GLOBALS['TL_LANG']['MONTHS']['1'], 'Zeigt alle Geburtstage im ' . $GLOBALS['TL_LANG']['MONTHS']['1'] . ' an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['march']            = array($GLOBALS['TL_LANG']['MONTHS']['2'], 'Zeigt alle Geburtstage im ' . $GLOBALS['TL_LANG']['MONTHS']['2'] . ' an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['april']            = array($GLOBALS['TL_LANG']['MONTHS']['3'], 'Zeigt alle Geburtstage im ' . $GLOBALS['TL_LANG']['MONTHS']['3'] . ' an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['may']              = array($GLOBALS['TL_LANG']['MONTHS']['4'], 'Zeigt alle Geburtstage im ' . $GLOBALS['TL_LANG']['MONTHS']['4'] . ' an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['june']             = array($GLOBALS['TL_LANG']['MONTHS']['5'], 'Zeigt alle Geburtstage im ' . $GLOBALS['TL_LANG']['MONTHS']['5'] . ' an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['july']             = array($GLOBALS['TL_LANG']['MONTHS']['6'], 'Zeigt alle Geburtstage im ' . $GLOBALS['TL_LANG']['MONTHS']['6'] . ' an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['august']           = array($GLOBALS['TL_LANG']['MONTHS']['7'], 'Zeigt alle Geburtstage im ' . $GLOBALS['TL_LANG']['MONTHS']['7'] . ' an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['september']        = array($GLOBALS['TL_LANG']['MONTHS']['8'], 'Zeigt alle Geburtstage im ' . $GLOBALS['TL_LANG']['MONTHS']['8'] . ' an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['october']          = array($GLOBALS['TL_LANG']['MONTHS']['9'], 'Zeigt alle Geburtstage im ' . $GLOBALS['TL_LANG']['MONTHS']['9'] . ' an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['november']         = array($GLOBALS['TL_LANG']['MONTHS']['10'], 'Zeigt alle Geburtstage im ' . $GLOBALS['TL_LANG']['MONTHS']['10'] . ' an.');
$GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods']['december']         = array($GLOBALS['TL_LANG']['MONTHS']['11'], 'Zeigt alle Geburtstage im ' . $GLOBALS['TL_LANG']['MONTHS']['11'] . ' an.');

/**
 * Units
 */
$GLOBALS['TL_LANG']['tl_module']['timeunits']['day']   = array('Tag(e)', 'Angabe der Zeit in Tagen.');
$GLOBALS['TL_LANG']['tl_module']['timeunits']['week']  = array('Woche(n)', 'Angabe der Zeit in Wochen. Bei der Berechung wird 1 Woche in 7 Tage umgewandelt.');
$GLOBALS['TL_LANG']['tl_module']['timeunits']['month'] = array('Monat(e)', 'Angabe der Zeit in Monaten. Bei der Berechung wird 1 Monat in 30 Tage umgewandelt.');

?>