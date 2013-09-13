#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# TypoScript for admin events list
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################

plugin.tx_jdavsv.settings.listConfig.adminEvents < plugin.tx_jdavsv.settings.listConfig.publicEvents
plugin.tx_jdavsv.settings.listConfig.adminEvents {

    fields {

        archived {
			table = __self__
			field = archived
        }

	}

    filters >
	filters {

		stateFilterbox {

			filterConfigs {


				## State filter
				40 < plugin.tx_ptextlist.prototype.filter.string
				40 {
					## Configuration does not matter here
					fieldIdentifier = archived
					filterIdentifier = stateFilter
					filterClassName = Tx_JdavSv_Extlist_Filters_EventsByStateAdminFilter
					label = Archiviert
				}

			}

		}

	}


    pager {

    	itemsPerPage = 50

    }

}



# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.adminEvents < plugin.tx_jdavsv.settings.listConfig.adminEvents