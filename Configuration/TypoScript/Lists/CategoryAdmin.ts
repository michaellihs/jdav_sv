#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# TypoScript Konfiguration für pt_extlist
# Darstellung von Veranstaltungskategorien
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################


plugin.tx_jdavsv.settings.listConfig.categoryAdmin {

    backendConfig < plugin.tx_ptextlist.prototype.backend.extbase
    backendConfig {
        repositoryClassName = Tx_JdavSv_Domain_Repository_CategoryRepository
    }
    
    
    
    fields {
    
        category {
            table = __self__
            field = __object__
        }

        name {
        	table = __self__
        	field = name
        }

		tourReportRequired {
			table = __self__
			field = tourReportRequired
		}

		shortcut {
			table = __self__
			field = shortcut
		}

    }
    
    
    
    columns {

        10 {
            fieldIdentifier = shortcut
            columnIdentifier = shortcut
            label = Kürzel
        }

        20 {
        	fieldIdentifier = name
        	columnIdentifier = name
        	label = Name
        }
    
    }



    pager {

    	## Show all categories
    	itemsPerPage = 0

    }

}



# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.categoryAdmin < plugin.tx_jdavsv.settings.listConfig.categoryAdmin