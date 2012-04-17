#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# TypoScript Konfiguration für pt_extlist
# Darstellung von Sektionen
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################


plugin.tx_jdavsv.settings.listConfig.sektionAdmin {

    backendConfig < plugin.tx_ptextlist.prototype.backend.extbase
    backendConfig {
        repositoryClassName = Tx_JdavSv_Domain_Repository_SektionRepository
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

		zip {
			table = __self__
			field = zip
		}

    }
    
    
    
    columns {

        10 {
            fieldIdentifier = zip
            columnIdentifier = zip
            label = Postleitzahl
        }

        20 {
        	fieldIdentifier = name
        	columnIdentifier = name
        	label = Name
        }
    
    }



    pager {

    	## Show all categories
    	itemsPerPage = 50

    }

}



# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.sektionAdmin < plugin.tx_jdavsv.settings.listConfig.sektionAdmin