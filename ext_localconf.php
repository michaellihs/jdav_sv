<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Event' => 'list, attendeeRegistrationsList, show',
        'EventAdmin' => 'list, update, new, create, delete, edit, teamerRegistrationsList, attendeeRegistrationsList',
		'Registration' => 'register,unregister,list, show, confirmRegistration',
        'RegistrationAdmin' => 'list,new, create, edit, update, delete',
		'Category' => 'list, show, new, create, edit, update, delete',
	),
	array(
		'Event' => 'list, attendeeRegistrationsList, show',
        'EventAdmin' => 'list, update, new, create, delete, edit, teamerRegistrationsList, attendeeRegistrationsList',
		'Registration' => 'register,unregister,list, show, confirmRegistration',
        'RegistrationAdmin' => 'list,new, create, edit, update, delete',
		'Category' => 'list, show, new, create, edit, update, delete',
	)
);

?>