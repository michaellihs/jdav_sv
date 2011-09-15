#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# TypoScript Konfiguration für pt_extlist
# Darstellung von TN-Liste für Teilnehmer
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################


plugin.tx_jdavsv.settings.listConfig.registrationsParticipants {

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

        state {
            table = __self__
            field = state
        }

        paymentMethod {
            table = __self__
            field = paymentMethod
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
    

    
    }

}



# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.registrationsParticipants < plugin.tx_jdavsv.settings.listConfig.registrationsParticipants