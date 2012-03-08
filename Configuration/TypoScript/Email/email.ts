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
		name = JDAV Landesgeschäftsstelle Baden-Württemberg e.V.
		email = info@jdav-bw.de
	}


	## Settings for templates used for mailings sent by this extension
	templatesBasePath = EXT:jdav_sv/Resources/Private/Templates/Email/
	templates {
		confirmRegistrationAttendee = confirmRegistrationAttendee.html
	}

}