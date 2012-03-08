#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
#
# Email Configuration
#
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################

plugin.tx_jdavsv.settings.email {

	## This settings are used as default FROM in E-Mails sent by this extension
	defaultFrom {
		name = {$plugin.tx_jdavsv.settings.email.defaultFrom.name}
		email = {$plugin.tx_jdavsv.settings.email.defaultFrom.email}
	}


	adminTo {
		name = {$plugin.tx_jdavsv.settings.email.adminTo.name}
		email = {$plugin.tx_jdavsv.settings.email.adminTo.email}
	}


	## Settings for templates used for mailings sent by this extension
	templatesBasePath = EXT:jdav_sv/Resources/Private/Templates/Email/
	templates {
		confirmReservationAttendee = confirmReservationAttendee.html
		confirmReservationAdmin = confirmReservationAdmin.html
		confirmUnregisterAttendee = confirmUnregisterAttendee.html
		confirmUnregisterAdmin = confirmUnregisterAdmin.html
	}

}