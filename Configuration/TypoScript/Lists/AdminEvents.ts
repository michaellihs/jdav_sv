#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# TypoScript for admin events list
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################

plugin.tx_jdavsv.settings.listConfig.adminEvents < plugin.tx_jdavsv.settings.listConfig.publicEvents
plugin.tx_jdavsv.settings.listConfig.adminEvents {

    filters >



    pager {

    	itemsPerPage = 50

    }

}



# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.adminEvents < plugin.tx_jdavsv.settings.listConfig.adminEvents