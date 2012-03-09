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
        'RegistrationAdmin' => 'list,new, create, edit, update, delete, moveUp, moveDown, moveToRegistrations, moveToWaitinglist',
		'Category' => 'list, new, create, edit, update, delete',
		'CategoryPrerequisites' => 'new, create, edit, update, delete',
		'FeUser' => 'list, show, new, create, edit, update, delete, changePassword, showChangePassword',
		'Accommodation' => 'list, new, create, edit, update, delete',
		'Export' => 'exportRegistrationsListForParticipants, exportRegistrationsListForTeamersAction,exportInvoiceForRegistration'
	),
	array(
		'Event' => 'list, attendeeRegistrationsList, show',
        'EventAdmin' => 'list, update, new, show, create, delete, edit, teamerRegistrationsList, attendeeRegistrationsList',
		'Registration' => 'register,unregister,list, show, confirmRegistration',
        'RegistrationAdmin' => 'list,new, create, edit, update, delete, moveUp, moveDown, moveToRegistrations, moveToWaitinglist',
		'Category' => 'list, new, create, edit, update, delete',
		'CategoryPrerequisites' => 'new, create, edit, update, delete',
		'FeUser' => 'list, show, new, create, edit, update, delete, changePassword, showChangePassword',
		'Accommodation' => 'list, new, create, edit, update, delete',
		'Export' => 'exportRegistrationsListForParticipants, exportRegistrationsListForTeamersAction,exportInvoiceForRegistration'
	)
);

?>