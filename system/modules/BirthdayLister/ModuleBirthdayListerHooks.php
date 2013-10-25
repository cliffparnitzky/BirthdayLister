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
 * Class ModuleBirthdayListerHooks
 *
 * Hook implementation for module "birthdayLister".
 * @copyright  Cliff Parnitzky 2013
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class ModuleBirthdayListerHooks
{
	/**
	 * Sort the birthday children by date of birth
	 */
	public function sortBirthdayChildren($arrBirthdayChildren, $modulConfig)
	{
		$sort_col = array();
		foreach ($arrBirthdayChildren as $key=> $birthdayChild)
		{
			$birthday = mktime(0, 0, 0, date("m", $birthdayChild['dateOfBirth']), date("d", $birthdayChild['dateOfBirth']), date("Y"));
			$sort_col[$key] = date('md', $birthday) . $this->getAgeWithLeadingZero($birthdayChild['age']) . $birthdayChild['id']; 
		}
		array_multisort($sort_col, SORT_ASC, $arrBirthdayChildren);
		
		return $arrBirthdayChildren;
	}
	
	/**
	 * Sort the birthday children for custom period (only if year limit crossing is allowed)
	 */
	public function sortBirthdayChildrenInCustomPeriod($arrBirthdayChildren, $modulConfig)
	{
		if ($modulConfig->birthdayListPeriod == 'custom_period' && $modulConfig->birthdayListPeriodCustomCrossYearLimits)
		{
			$startDayOfYear = $this->getStartDayOfYear($modulConfig);
			
			$sort_col = array();
			foreach ($arrBirthdayChildren as $key=> $birthdayChild)
			{
				$yearIncrement = (date("z", $birthdayChild['dateOfBirth']) < $startDayOfYear) ? 1 : 0;
				$nextBirthday = mktime(0, 0, 0, date("m", $birthdayChild['dateOfBirth']), date("d", $birthdayChild['dateOfBirth']), date("Y") + $yearIncrement);
				$arrBirthdayChildren[$key]['age'] = intval($birthdayChild['age'] + $yearIncrement);
				$sort_col[$key] = date('Ymd', $nextBirthday) . $this->getAgeWithLeadingZero($birthdayChild['age']) . $birthdayChild['id']; 
			}
			array_multisort($sort_col, SORT_ASC, $arrBirthdayChildren);
		}
		
		return $arrBirthdayChildren;
	}
	
	/**
	 * Returns the age with leading zeros.
	 */
	private function getAgeWithLeadingZero($age)
	{
		if ($age < 10)
		{
			return "00" . $age;
		}
		else if ($age < 100)
		{
			return "0" . $age;
		}
		return $age;
	}
	
	/**
	 * Check if actual birthday is in period
	 */
	public function isBirthdayChildListableInCustomPeriod($birthdayInPeriod, $modulConfig, $birthday, $birthdayChild)
	{
		if ($modulConfig->birthdayListPeriod == 'custom_period')
		{
			$startDayOfYear = $this->getStartDayOfYear($modulConfig);
			$endDayOfYear = $this->getEndDayOfYear($modulConfig);
			
			$birthdayDateOfYear = date('z', $birthday);
			
			$birthdayInPeriod = ($birthdayDateOfYear >= $startDayOfYear) && ($birthdayDateOfYear <= $endDayOfYear);
			
			if ($modulConfig->birthdayListPeriodCustomCrossYearLimits)
			{
				if (!$birthdayInPeriod && $startDayOfYear < 0)
				{
					$birthdayDateOfPreviousYear = $birthdayDateOfYear - 365;
					$birthdayInPeriod = ($birthdayDateOfPreviousYear >= $startDayOfYear) && ($birthdayDateOfPreviousYear <= $endDayOfYear);
				}
				
				if (!$birthdayInPeriod && $endDayOfYear > 365)
				{
					$birthdayDateOfFollowingYear = $birthdayDateOfYear + 365;
					$birthdayInPeriod = ($birthdayDateOfFollowingYear >= $startDayOfYear) && ($birthdayDateOfFollowingYear <= $endDayOfYear);
				}
			}
		}
		return $birthdayInPeriod;
	}
	
	/**
	 * Returns, depending on the unit the number of days to use for the period limits.
	 */
	private function getPeriodLimitDays ($periodValue)
	{
		if ($periodValue['unit'] == 'week')
		{
			return $periodValue['value'] * 7;
		}
		else if ($periodValue['unit'] == 'month')
		{
			return $periodValue['value'] * 30;
		}
		return $periodValue['value'];
	}
	
	/**
	 * Returns the day of year of the period start
	 */
	private function getStartDayOfYear($modulConfig)
	{
		return date('z') - intval($this->getPeriodLimitDays(deserialize($modulConfig->birthdayListPeriodCustomStart)));
	}
	
	/**
	 * Returns the day of year of the period end
	 */
	private function getEndDayOfYear($modulConfig)
	{
		return date('z') + intval($this->getPeriodLimitDays(deserialize($modulConfig->birthdayListPeriodCustomEnd)));
	}
}

?>