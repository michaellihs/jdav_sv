<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Event' => 'list, show, new, create, edit, update, delete',
		'Registration' => 'register,unregister,list, show, new, create, edit, update, delete, confirmRegistration',
		'Category' => 'list, show, new, create, edit, update, delete',
	),
	array(
		'Event' => 'list, show, new, create, edit, update, delete',
		'Registration' => 'register,unregister,list,show, new, create, edit, update, delete, confirmRegistration',
		'Category' => 'list, show, new, create, edit, update, delete',
	)
);

?>