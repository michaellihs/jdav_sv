#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# TypoScript Konfiguration für pt_extlist
# Darstellung von Benutzern
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################


plugin.tx_jdavsv.settings.listConfig.feUsersAdmin {

    backendConfig < plugin.tx_ptextlist.prototype.backend.extbase
    backendConfig {
        repositoryClassName = Tx_JdavSv_Domain_Repository_FeUserRepository
        #sorting = title
    }
    
    
    
    fields {
    
        feUser {
            table = __self__
            field = __object__
        }

		username {
			table = __self__
			field = username
		}

		password {
			table = __self__
			field = password
		}

		usergroup {
			table = __self__
			field = usergroup
		}

		name {
			table = __self__
			field = name
		}

		firstName {
			table = __self__
			field = firstName
		}

		middleName {
			table = __self__
			field = middleName
		}

		lastName {
			table = __self__
			field = lastName
		}

		address {
			table = __self__
			field = address
		}

		telephone {
			table = __self__
			field = telephone
		}

		fax {
			table = __self__
			field = fax
		}

		email {
			table = __self__
			field = email
		}

		lockToDomain {
			table = __self__
			field = lockToDomain
		}

		title {
			table = __self__
			field = title
		}

		zip {
			table = __self__
			field = zip
		}

		city {
			table = __self__
			field = city
		}

		country {
			table = __self__
			field = country
		}

		www {
			table = __self__
			field = www
		}

		company {
			table = __self__
			field = company
		}

		image {
			table = __self__
			field = image
		}

		lastlogin {
			table = __self__
			field = lastLogin
		}

		isOnline {
			table = __self__
			field = isOnline
		}

		isTeamer {
			table = __self__
			field = isTeamer
		}

		isTrainee {
			table = __self__
			field = isTrainee
		}

		isKitchenGroup {
			table = __self__
			field = isKitchenGroup
		}

		isAdmin {
			table = __self__
			field = isAdmin
		}
    
    }
    
    
    
    columns {

        10 {
            fieldIdentifier = lastName
            columnIdentifier = lastName
            label = Nachname
        }

        20 {
        	fieldIdentifier = firstName
        	columnIdentifier = firstName
        	label = Vorname
        }

        30 {
            fieldIdentifier = email
            columnIdentifier = email
            label = E-Mail
        }

        40 {
        	fieldIdentifier = telephone
        	columnIdentifier = telephone
        	label = Telefon
        }
    
    }



    filters {

		feUserFilters {

			filterConfigs {

				## Username filter
				10 < plugin.tx_ptextlist.prototype.filter.string
				10 {
					filterIdentifier = usernameFilter
					label = Name
					fieldIdentifier = firstName, lastName
				}

				## Email filter
				20 < plugin.tx_ptextlist.prototype.filter.string
				20 {
					filterIdentifier = emailFilter
					label = E-Mail
					fieldIdentifier = email
				}

				## Teamer Filter
				30 < plugin.tx_ptextlist.prototype.filter.string
				30 {
					filterIdentifier = teamerFilter
					label = Teamer
					fieldIdentifier = isTeamer
				}

				## Hospitanten Filter
				40 < plugin.tx_ptextlist.prototype.filter.string
				40 {
					filterIdentifier = traineeFilter
					label = Hospitant
					fieldIdentifier = isTrainee
				}

				## Kochgruppen Filter
				50 < plugin.tx_ptextlist.prototype.filter.string
				50 {
					filterIdentifier = kitchenGroupFilter
					label = Kochgruppe
					fieldIdentifier = isKitchenGroup
				}

				## Admin Filter
				60 < plugin.tx_ptextlist.prototype.filter.string
				60 {
					filterIdentifier = adminFilter
					label = Administratoren
					fieldIdentifier = isAdmin
				}

			}

		}

	}

}



# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.feUsersAdmin < plugin.tx_jdavsv.settings.listConfig.feUsersAdmin