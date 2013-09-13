<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Login' => 'showLoginForm',
		'Event' => 'list, attendeeRegistrationsList, show',
		'EventYear' => 'list,create,new,edit,update,delete',
        'EventAdmin' => 'show, list, update, new, create, delete, edit, teamerRegistrationsList, attendeeRegistrationsList, myEventsList, sort, setRegistrationsPaid',
		'Registration' => 'register,unregister,list, show, confirmRegistration',
        'RegistrationAdmin' => 'list,new, create, edit, update, delete, moveUp, moveDown, moveToRegistrations, moveToWaitinglist, sendConfirmation, sort',
		'Category' => 'list, new, create, edit, update, delete, sort',
		'CategoryPrerequisites' => 'new, create, edit, update, delete',
		'FeUser' => 'list, show, new, create, edit, update, delete, changePassword, showChangePassword, sort',
		'Accommodation' => 'list, new, create, edit, update, delete, sort',
		'SektionAdmin' => 'list, new, create, edit, update, delete, sort',
		'Export' => 'exportRegistrationsListForParticipants, exportRegistrationsListForTeamersAction,exportInvoiceForRegistration,exportRegistrationDebitInformation',
		'Message' => 'showParticipantsMessageAdminForm, sendMessageToParticipants'
	),
	array(
		'Login' => 'showLoginForm',
		'Event' => 'list, attendeeRegistrationsList, show',
		'EventYear' => 'list,create,new,edit,update,delete',
		'EventAdmin' => 'show, list, update, new, create, delete, edit, teamerRegistrationsList, attendeeRegistrationsList, myEventsList, sort, setRegistrationsPaid',
		'Registration' => 'register,unregister,list, show, confirmRegistration',
		'RegistrationAdmin' => 'list,new, create, edit, update, delete, moveUp, moveDown, moveToRegistrations, moveToWaitinglist, sendConfirmation, sort',
		'Category' => 'list, new, create, edit, update, delete, sort',
		'CategoryPrerequisites' => 'new, create, edit, update, delete',
		'FeUser' => 'list, show, new, create, edit, update, delete, changePassword, showChangePassword, sort',
		'Accommodation' => 'list, new, create, edit, update, delete, sort',
		'SektionAdmin' => 'list, new, create, edit, update, delete, sort',
		'Export' => 'exportRegistrationsListForParticipants, exportRegistrationsListForTeamersAction,exportInvoiceForRegistration,exportRegistrationDebitInformation',
		'Message' => 'showParticipantsMessageAdminForm, sendMessageToParticipants'
	)
);