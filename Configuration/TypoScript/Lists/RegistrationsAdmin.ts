#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# TypoScript Konfiguration für pt_extlist
# Darstellung von Anmeldungen im Frontend
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################


plugin.tx_jdavsv.settings.listConfig.registrationsAdmin {

    backendConfig < plugin.tx_ptextlist.prototype.backend.extbase
    backendConfig {
        repositoryClassName = Tx_JdavSv_Domain_Repository_RegistrationRepository
        #sorting = title
    }
    
    
    
    fields {
    
        registration {
            table = __self__
            field = __object__
        }

        date {
            table = __self__
            field = date
        }

        attendee {
            table = __self__
            field = attendee
        }

        reservedUntil {
            table = __self__
            field = reservedUntil
        }

        waitingList {
            table = __self__
            field = waitingList
        }

        registrationOrder {
            table = __self__
            field = registrationOrder
        }

        vegetarian {
            table = __self__
            field = vegetarian
        }

        event {
            table = __self__
            field = event
        }

        isAccepted {
            table = __self__
            field = isAccepted
        }

        eventUid {
        	table = __self__
        	field = event.uid
        }

        eventTitle {
        	table = event
        	field = title
        }

    }
    
    
    
    columns {

        10 {
            fieldIdentifier = date
            columnIdentifier = date
            label = Anmeldedatum
        }

        20 {
            fieldIdentifier = event
            columnIdentifier = event
            label = Veranstaltung
        }

        30 {
        	fieldIdentifier = attendee
        	columnIdentifier = attendee
        	label = Teilnehmer
        }
    
    }


	filters {

		registrationAdminFilters {

			filterConfigs {

				## Username filter
				10 < plugin.tx_ptextlist.prototype.filter.string
				10 {
					filterClassName = Tx_JdavSv_Extlist_Filters_RegistrationsByUsernameAdminFilter
					filterIdentifier = userFilter
					label = Name
					fieldIdentifier = attendee
				}

				## Event filter
				20 < plugin.tx_ptextlist.prototype.filter.string
				20 {
					filterClassName = Tx_JdavSv_Extlist_Filters_RegistrationsByEventAdminFilter
					filterIdentifier = eventFilter
					label = Veranstaltung
					fieldIdentifier = event
				}

				## Date filter
				30 < plugin.tx_ptextlist.prototype.filter.dateRange
				30 {
					fieldIdentifier = date
					filterIdentifier = dateFilter
				}

				## State filter
				40 < plugin.tx_ptextlist.prototype.filter.string
				40 {
					## Configuration does not matter here
					fieldIdentifier = date
					filterIdentifier = stateFilter
					filterClassName = Tx_JdavSv_Extlist_Filters_RegistrationsByStateAdminFilter
					label = Anmeldezustand
				}

			}

		}

	}



    pager {

    	itemsPerPage = 20

    }

}



# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.registrationsAdmin < plugin.tx_jdavsv.settings.listConfig.registrationsAdmin