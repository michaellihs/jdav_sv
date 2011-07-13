<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Event' => 'list, show, new, create, edit, update, delete',
		'Registration' => 'register,list, show, new, create, edit, update, delete',
		'Category' => 'list, show, new, create, edit, update, delete',
	),
	array(
		'Event' => 'create, update, delete',
		'Registration' => 'register,create, update, delete',
		'Category' => 'create, update, delete',
	)
);

?>