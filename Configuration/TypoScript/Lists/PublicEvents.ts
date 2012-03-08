#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# TypoScript Konfiguration für pt_extlist
# Darstellung von Schulungen im Frontend
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################


plugin.tx_jdavsv.settings.listConfig.publicEvents {

    backendConfig < plugin.tx_ptextlist.prototype.backend.extbase
    backendConfig {
        repositoryClassName = Tx_JdavSv_Domain_Repository_EventRepository
        sorting = dateEnd
    }
    
    
    
    fields {
    
        event {
            table = __self__
            field = __object__
        }
    
        dateStart {
            table = __self__
            field = dateStart
            isSortable = 1
        }
        
        dateEnd {
            table = __self__
            field = dateEnd
            isSortable = 1
        }
        
        title {
            table = __self__
            field = title
            isSortable = 1
        }
        
        category {
            table = __self__
            field = category
            isSortable = 0
        }
        
        accreditationNumber {
            table = __self__
            field = accreditationNumber
            isSortable = 1
        }
        
        price {
            table = __self__
            field = price
            isSortable = 1
        }
        
        maxRegistrations {
            table = __self__
            field = maxRegistrations
            isSortable = 1
        }
    
    }
    
    
    
    columns {
    
        10 {
            fieldIdentifier = accreditationNumber
            columnIdentifier = accreditationNumber
            label = Akk-Nr
            sorting = accreditationNumber
        }
        
        20 {
            fieldIdentifier = dateEnd, dateStart
            columnIdentifier = dateEnd
            label = Ende
            sortingFields {
                10 {
                    field = dateStart
                    label = Beginn
                    direction = asc
                    forceDirection = 0
                }

                20 {
                    field = dateEnd
                    label = Ende
                    direction = asc
                    forceDirection = 0
                }
            }
        }
        
        30 {
            fieldIdentifier = title
            columnIdentifier = title
            label = Titel
            sorting = title
        }

        40 {
            fieldIdentifier = event
            columnIdentifier = event
            label =
            isSortable = 0
        }
    
    }

}



# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.publicEvents < plugin.tx_jdavsv.settings.listConfig.publicEvents