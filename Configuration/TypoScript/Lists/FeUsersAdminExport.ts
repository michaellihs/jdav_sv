#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# TypoScript Konfiguration für pt_extlist
# Export von Benutzern
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################


plugin.tx_jdavsv.settings.listConfig.feUsersAdminExport < plugin.tx_jdavsv.settings.listConfig.feUsersAdmin


# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.feUsersAdminExport < plugin.tx_jdavsv.settings.listConfig.feUsersAdminExport