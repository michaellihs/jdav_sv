#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# TypoScript Konfiguration für pt_extlist
# Darstellung von TN-Liste für Teilnehmer
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################


plugin.tx_jdavsv.settings.listConfig.registrationsParticipantsExcelExport < plugin.tx_jdavsv.settings.listConfig.registrationsParticipants
plugin.tx_jdavsv.settings.listConfig.registrationsParticipantsExcelExport {

	default.sortingColumn = nameColumn

    fields {



    }



    columns {



    }

}



# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.registrationsParticipantsExcelExport < plugin.tx_jdavsv.settings.listConfig.registrationsParticipantsExcelExport