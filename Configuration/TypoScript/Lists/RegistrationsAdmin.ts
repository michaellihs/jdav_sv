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

}



# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.registrationsAdmin < plugin.tx_jdavsv.settings.listConfig.registrationsAdmin