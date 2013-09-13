#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# TypoScript Konfiguration für pt_extlist
# Export von Benutzern
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################


plugin.tx_jdavsv.settings.listConfig.feUsersAdminExport < plugin.tx_jdavsv.settings.listConfig.feUsersAdmin


plugin.tx_jdavsv.settings.listConfig.feUsersAdminExport {

	columns {

		45 {
			fieldIdentifier = mobilePhone
			columnIdentifier = mobilePhone
			label = Handy
		}

		50 {
			fieldIdentifier = sektion
			columnIdentifier = sektion
			label = Sektion
		}

		55 {
			fieldIdentifier = zip
			columnIdentifier = zip
			label = PLZ
		}

		60 {
			fieldIdentifier = city
			columnIdentifier = city
			label = Ort
		}


		70 {
			fieldIdentifier = address
			columnIdentifier = address
			label = Adresse
		}

		80 {
			fieldIdentifier = davNr
			columnIdentifier = davNr
			label = DAV Nr.
		}

		90 {
			fieldIdentifier = juleiNr
			columnIdentifier = juleiNr
			label = Julei Nr.
		}

		100 {
			fieldIdentifier = dateOfBirth
			columnIdentifier = dateOfBirth
			label = Geburtsdatum
		}

	}

	pager {
		itemsPerPage = 0
	}

}

# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.feUsersAdminExport < plugin.tx_jdavsv.settings.listConfig.feUsersAdminExport