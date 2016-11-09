[![Latest Version on Packagist](http://img.shields.io/packagist/v/cliffparnitzky/birthday-lister.svg?style=flat)](https://packagist.org/packages/cliffparnitzky/birthday-lister)
[![Installations via composer per month](http://img.shields.io/packagist/dm/cliffparnitzky/birthday-lister.svg?style=flat)](https://packagist.org/packages/cliffparnitzky/birthday-lister)
[![Installations via composer total](http://img.shields.io/packagist/dt/cliffparnitzky/birthday-lister.svg?style=flat)](https://packagist.org/packages/cliffparnitzky/birthday-lister)

Contao Extension: BirthdayLister
================================

Provides a module to list member birthdays (past, actual, upcoming).


Installation
------------

Install the extension via composer: [cliffparnitzky/birthday-lister](https://packagist.org/packages/cliffparnitzky/birthday-lister).

If you prefer to install it manually, download the latest release here: https://github.com/cliffparnitzky/BirthdayLister/releases


Tracker
-------

https://github.com/cliffparnitzky/BirthdayLister/issues


Compatibility
-------------

- min. Contao version: >= 3.2.0
- max. Contao version: <  3.6.0


Dependency
----------

- This extension is dependent on the following extensions: [[contao-legacy/associategroups]](https://legacy-packages-via.contao-community-alliance.org/packages/contao-legacy/associategroups)


Screenshots
-----------

![Screenshot: System settings](https://raw.github.com/cliffparnitzky/BirthdayLister/master/screenshot.jpg)


CSS classes
-----------

- `birthday_is_today` : marks a list item which birthday is today
- `member_is_inactive` : marks a list item which member is inactive
- `birthday` : marks the span inside a list item containing the date of birth
- `name` : marks the span inside a list item containing the name (firstname and lastname)
- `age` : marks the span inside a list item containing the age
- `first`, `last` : marks the first and last list item
- `even`, `odd` : marks each list item as even or odd


Hooks
-----

### birthdayListerModifyBirthdayChildren

The "birthdayListerModifyBirthdayChildren" hook is triggered for modifying the list of birthday children. So custom sorting is possible or removing of birthday children.
It passes `$arrBirthdayChildren` (the array of birthday children), `$modulConfig` (the modul configuration to get user definings).
It expects an array of birthday children as return value.

```
// config.php

$GLOBALS['TL_HOOKS']['birthdayListerModifyBirthdayChildren'][]   = array('MyClass', 'myModification');

// MyClass.php

class MyClass
{
	public function myModification($arrBirthdayChildren, $modulConfig)
	{
		if ($modulConfig->birthdayListPeriod == 'mySpecialPeriod')
		{
			// do custom modification here
		}
		return $arrBirthdayChildren;
	}
}
```

### birthdayListerCheckBirthdayInPeriod

The "birthdayListerCheckBirthdayInPeriod" hook is triggered when checking if a birthday is in the defined period. So custom periods could be added or custom checking is possible.
It passes `$birthdayInPeriod` (current decision if the birthday is in period), `$modulConfig` (the modul configuration to get user definings), `$birthday` (the date of birth normalized to the actual year),
`$birthdayChild` (the database object of a member). It expects a boolean (is birthday in period) as return value.

```
// config.php

$GLOBALS['TL_HOOKS']['birthdayListerCheckBirthdayInPeriod'][]   = array('MyClass', 'myPeriodCheck');

// MyClass.php

class MyClass
{
	public function myPeriodCheck($birthdayInPeriod, $modulConfig, $birthday, $birthdayChild)
	{
		if ($modulConfig->birthdayListPeriod == 'mySpecialPeriod')
		{
			// do custom checking here
		}
		return $birthdayInPeriod;
	}
}
```
