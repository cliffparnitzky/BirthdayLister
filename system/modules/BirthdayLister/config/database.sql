-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `birthdayListPeriod` varchar(20) NOT NULL default '',
  `birthdayListPeriodCustomStart` varchar(255) NOT NULL default '',
  `birthdayListPeriodCustomEnd` varchar(255) NOT NULL default '',
  `birthdayListPeriodCustomCrossYearLimits` char(1) NOT NULL default '',
  `birthdayListMemberGroups` blob NOT NULL,
  `birthdayListDateFormat` varchar(64) NOT NULL default '',
  `birthdayListShowInactiveMembers` char(1) NOT NULL default '',
  `birthdayListTemplate` varchar(64) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

