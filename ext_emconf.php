<?php

########################################################################
# Extension Manager/Repository config file for ext: "pmktsvoila"
#
# Auto generated 30-07-2009 13:05
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'PMK TSVoila',
	'description' => 'Provides an alternate TemplaVoila rendering. With this you can render each TV column separately in your Typoscript setup. (Similar to the "old-style" colPos method.)',
	'category' => 'misc',
	'author' => 'Peter Klein',
	'author_email' => 'pmk@io.dk',
	'shy' => 1,
	'dependencies' => 'templavoila',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '0.0.0',
	'constraints' => array(
		'depends' => array(
			'templavoila' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:4:{s:12:"ext_icon.gif";s:4:"12be";s:17:"ext_localconf.php";s:4:"543b";s:15:"ext_php_api.dat";s:4:"ee93";s:31:"pi1/class.tx_pmktsvoila_pi1.php";s:4:"8ad0";}',
	'suggests' => array(
	),
);

?>