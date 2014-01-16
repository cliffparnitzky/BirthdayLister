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
 * Class ModuleBirthdayLister
 *
 * Front end module "birthdayLister".
 * @copyright  Cliff Parnitzky 2013-2014
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class ModuleBirthdayLister extends Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_birthdaylister';

	/**
	 * Redirect to the selected page
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### BIRTHDAY LISTER ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		return parent::generate();
	}

	/**
	 * Generate module
	 */
	protected function compile()
	{
		// first check if required extension 'associategroups' is installed
		if (!in_array('associategroups', $this->Config->getActiveModules()))
		{
			$this->log('ModuleBirthdayLister: Extension "associategroups" is required!', 'ModuleBirthdayLister compile()', TL_ERROR);
			return false;
		}
		
		if ($this->birthdayListTemplate != $strTemplate)
		{
			$this->strTemplate = $this->birthdayListTemplate;

			$this->Template = new \FrontendTemplate($this->strTemplate);
			$this->Template->setData($this->arrData);
		}
		
		$birthdayChildren = array();
		
		$membergroups = deserialize($this->birthdayListMemberGroups);
		$membergroups = implode(',', $membergroups);
		
		if (strlen($membergroups) > 0)
		{
			$objBirthdayChild = $this->Database->execute("SELECT tl_member.*, tl_member_group.disable as memberGroupDisable, tl_member_group.start as memberGroupStart, tl_member_group.stop as memberGroupStop
													  FROM tl_member
													  JOIN tl_member_to_group ON tl_member_to_group.member_id = tl_member.id
													  JOIN tl_member_group ON tl_member_group.id = tl_member_to_group.group_id
													  WHERE tl_member_to_group.group_id IN (" . $membergroups . ") 
													  GROUP BY tl_member.id");
		}
		else
		{
			$this->log('ModuleBirthdayLister: No member group(s) defined for module', 'ModuleBirthdayLister compile()', TL_ERROR);
			return false;
		}
		
		if ($objBirthdayChild->numRows)
		{
			while($objBirthdayChild->next())
			{
				if (is_numeric($objBirthdayChild->dateOfBirth) && $this->isBirthdayChildListable($objBirthdayChild)
					&& ($this->birthdayListShowInactiveMembers || $this->isMemberActive($objBirthdayChild)) && $this->isMemberGroupActive($objBirthdayChild))
				{
					$birthdayChild['id'] = $objBirthdayChild->id;
					$birthdayChild['username'] = $objBirthdayChild->username;
					$birthdayChild['firstname'] = $objBirthdayChild->firstname;
					$birthdayChild['lastname'] = $objBirthdayChild->lastname;
					$birthdayChild['dateOfBirth'] = $objBirthdayChild->dateOfBirth;
					$birthdayChild['birthday'] = $this->parseDate($this->birthdayListDateFormat, $objBirthdayChild->dateOfBirth);
					$birthdayChild['age'] = date("Y") - date("Y", $objBirthdayChild->dateOfBirth);
					
					$cssClasses = array();
					if (date("d.m") == date("d.m", $objBirthdayChild->dateOfBirth))
					{
						$cssClasses[] = 'birthday_is_today';
					}
					if (!$this->isMemberActive($objBirthdayChild))
					{
						$cssClasses[] = 'member_is_inactive';
					}
					$birthdayChild['class'] = implode(' ', $cssClasses);
					
					$birthdayChildren[] = $birthdayChild;
				}
			}
		}
		
		if (count($birthdayChildren) == 0)
		{
			$this->Template->hasBirthdays = false;
			switch ($this->birthdayListPeriod)
			{
				case 'all'              : $this->Template->messageNoBirthdays = $GLOBALS['TL_LANG']['BirthdayLister']['noBirthdays']; break;
				case 'current_day'      : $this->Template->messageNoBirthdays = $GLOBALS['TL_LANG']['BirthdayLister']['noBirthdaysCurrentDay']; break;
				case 'current_week'     : $this->Template->messageNoBirthdays = $GLOBALS['TL_LANG']['BirthdayLister']['noBirthdaysCurrentWeek']; break;
				case 'current_month'    : $this->Template->messageNoBirthdays = $GLOBALS['TL_LANG']['BirthdayLister']['noBirthdaysCurrentMonth']; break;
				case 'current_quarter'  : $this->Template->messageNoBirthdays = $GLOBALS['TL_LANG']['BirthdayLister']['noBirthdaysCurrentQuarter']; break;
				case 'current_halfyear' : $this->Template->messageNoBirthdays = $GLOBALS['TL_LANG']['BirthdayLister']['noBirthdaysCurrentHalfyear']; break;
				case 'custom_period'    : $this->Template->messageNoBirthdays = $GLOBALS['TL_LANG']['BirthdayLister']['noBirthdaysCurrentPeriod']; break;
				case 'january'          : 
				case 'february'         :
				case 'march'            :
				case 'april'            :
				case 'may'              :
				case 'june'             :
				case 'july'             :
				case 'august'           :
				case 'september'        :
				case 'october'          :
				case 'november'         :
				case 'december'         : $this->loadLanguageFile('tl_module'); 
				                          $this->Template->messageNoBirthdays = sprintf($GLOBALS['TL_LANG']['BirthdayLister']['noBirthdaysMonth'], $GLOBALS['TL_LANG']['tl_module']['birthdayListPeriods'][$this->birthdayListPeriod]);
				                          break;
				default                 : $this->Template->messageNoBirthdays = $GLOBALS['TL_LANG']['BirthdayLister']['noBirthdays']; break;
			}
		}
		else
		{
			// do modification, e.g. sorting
			if (isset($GLOBALS['TL_HOOKS']['birthdayListerModifyBirthdayChildren']) && is_array($GLOBALS['TL_HOOKS']['birthdayListerModifyBirthdayChildren']))
			{
				foreach ($GLOBALS['TL_HOOKS']['birthdayListerModifyBirthdayChildren'] as $callback)
				{
					$this->import($callback[0]);
					$birthdayChildren = $this->$callback[0]->$callback[1]($birthdayChildren, $this);
				}
			}
			
			$this->Template->hasBirthdays = true;
			$this->Template->birthdayChildren = $birthdayChildren;
		}
	}
	
	/**
	 * Checks, depending on the birthdayListPeriod if the actual birthday child should be listed.
	 */
	private function isBirthdayChildListable ($objBirthdayChild)
	{
		$listBirthdayChild = false;
		$birthday = mktime(0, 0, 0, date("m", $objBirthdayChild->dateOfBirth), date("d", $objBirthdayChild->dateOfBirth), date("Y"));
		switch ($this->birthdayListPeriod)
		{
			case 'all'              : $listBirthdayChild = true; break;
			case 'current_day'      : $listBirthdayChild = date("d.m") == date("d.m", $birthday); break;
			case 'current_week'     : $listBirthdayChild = date("W") == date("W", $birthday); break;
			case 'current_month'    : $listBirthdayChild = date("m") == date("m", $birthday); break;
			case 'current_quarter'  : $listBirthdayChild = ceil(date("m") / 3) == ceil(date("m", $birthday) / 3); break;
			case 'current_halfyear' : $listBirthdayChild = ceil(date("m") / 6) == ceil(date("m", $birthday) / 6); break;
			case 'custom_period'    : /* implemented in HOOK ... would be too confusing here */ break;
			case 'january'          : $listBirthdayChild = date("n", $birthday) == 1; break;
			case 'february'         : $listBirthdayChild = date("n", $birthday) == 2; break;
			case 'march'            : $listBirthdayChild = date("n", $birthday) == 3; break;
			case 'april'            : $listBirthdayChild = date("n", $birthday) == 4; break;
			case 'may'              : $listBirthdayChild = date("n", $birthday) == 5; break;
			case 'june'             : $listBirthdayChild = date("n", $birthday) == 6; break;
			case 'july'             : $listBirthdayChild = date("n", $birthday) == 7; break;
			case 'august'           : $listBirthdayChild = date("n", $birthday) == 8; break;
			case 'september'        : $listBirthdayChild = date("n", $birthday) == 9; break;
			case 'october'          : $listBirthdayChild = date("n", $birthday) == 10; break;
			case 'november'         : $listBirthdayChild = date("n", $birthday) == 11; break;
			case 'december'         : $listBirthdayChild = date("n", $birthday) == 12; break;
			default                 : $listBirthdayChild = true;
		}
		
		if (isset($GLOBALS['TL_HOOKS']['birthdayListerCheckBirthdayInPeriod']) && is_array($GLOBALS['TL_HOOKS']['birthdayListerCheckBirthdayInPeriod']))
		{
			foreach ($GLOBALS['TL_HOOKS']['birthdayListerCheckBirthdayInPeriod'] as $callback)
			{
				$this->import($callback[0]);
				$listBirthdayChild = $this->$callback[0]->$callback[1]($listBirthdayChild, $this, $birthday, $objBirthdayChild);
			}
		}
		
		return $listBirthdayChild;
	}
	
	/**
	 * Checks if the member is active.
	 * @return boolean
	 */
	private function isMemberActive($objBirthdayChild)
	{
		if ($objBirthdayChild->disable || (strlen($objBirthdayChild->start) > 0 && $objBirthdayChild->start > time())
				|| (strlen($objBirthdayChild->stop) > 0 && $objBirthdayChild->stop < time()))
		{
			return false;
		}
		return true;
	}

	/**
	 * Checks if the associated group is active.
	 * @return boolean
	 */
	private function isMemberGroupActive($objBirthdayChild)
	{
		if ($objBirthdayChild->memberGroupDisable || (strlen($objBirthdayChild->memberGroupStart) > 0 && $objBirthdayChild->memberGroupStart > time())
				|| (strlen($objBirthdayChild->memberGroupStop) > 0 && $objBirthdayChild->memberGroupStop < time()))
		{
			return false;
		}
		return true;
	} 
}

?>