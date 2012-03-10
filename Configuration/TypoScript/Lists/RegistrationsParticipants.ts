#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# TypoScript Konfiguration für pt_extlist
# Darstellung von TN-Liste für Teilnehmer
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################

plugin.tx_jdavsv.settings.listConfig.registrationsParticipants {

    backendConfig < plugin.tx_ptextlist.prototype.backend.typo3
    backendConfig {

        tables (
            tx_jdavsv_domain_model_registration registration,
            tx_jdavsv_domain_model_event event,
            fe_users
        )

        baseFromClause (
            tx_jdavsv_domain_model_registration registration
            LEFT JOIN tx_jdavsv_domain_model_event event ON registration.event = event.uid
            LEFT JOIN fe_users ON registration.attendee = fe_users.uid
        )

        baseWhereClause (
            registration.deleted <> 1
        )

    }



    fields {

        event_uid {
            table = event
            field = uid
            isSortable = 0
        }

        first_name {
            table = fe_users
            field = first_name
            isSortable = 1
        }

        last_name {
            table = fe_users
            field = last_name
            isSortable = 1
        }

        address {
            table = fe_users
            field = address
            isSortable = 0
        }

        telephone {
            table = fe_users
            field = telephone
            isSortable = 0
        }

        zip {
            table = fe_users
            field = zip
            isSortable = 1
        }

        email {
            table = fe_users
            field = email
            isSortable = 0
        }

    }



    columns {

        10 {
            label = Nachname, Vorname
            fieldIdentifier = last_name, first_name
            columnIdentifier = nameColumn
        }

        20 {
            label = Adresse
            fieldIdentifier = address
            columnIdentifier = addressColumn
            sortingFields {
                10 {
                    field = zip
                    direction = asc
                    forceDirection = 0
                    label = Adresse (nach PLZ sortieren)
                }
            }
        }

        30 {
            label = Telefon
            fieldIdentifier = telephone
            columnIdentifier = telephoneColumn
            isSortable = 0
        }

        40 {
            label = E-Mail
            fieldIdentifier = email
            columnIdentifier = emailColumn
            isSortable = 0
        }
    }



    filters {

        filterbox1 {

            filterConfigs {

                10 {
                    filterClassName = Tx_JdavSv_Extlist_Filters_RegistrationsByEventFilter
                    partialPath = noPartialToBeSetHere
                    filterIdentifier = registrationsByEventFilter
                    label = nothinToLabelHere
                    fieldIdentifier = event_uid
                }

            }

        }

    }



    pager {

    	itemsPerPage = 0

    }

}



# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.registrationsParticipants < plugin.tx_jdavsv.settings.listConfig.registrationsParticipants