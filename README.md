Contao Extension: BirthdayLister
================================

Provides a module to list member birthdays (past, actual, upcoming).


Installation
------------

The extension is not published in contao extension repository.
Install it manually.


Tracker
-------

https://github.com/cliffparnitzky/BirthdayLister/issues


Compatibility
-------------

- min. version: Contao 2.9.5
- max. version: Contao 3.1.x


Dependency
----------

- This extension is dependent on the following extensions: [[associategroups]](http://contao.org/de/extension-list/view/associategroups.de.html)


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


Hooks
-----

### birthdayListerModifyBirthdayChildren

The "birthdayListerModifyBirthdayChildren" hook is triggered for modifying the list of birthday children. So custom sorting is possible or removing of birthday children.
It passes `$arrBirthdayChildren` (the array of birthday children), `$modulConfig` (the modul configuration to get user definings).
It an array of birthday children as return value.

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
