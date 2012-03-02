#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# TypoScript Konfiguration für pt_extlist
# Darstellung von Veranstaltungsorten
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################


plugin.tx_jdavsv.settings.listConfig.accommodationAdmin {

    backendConfig < plugin.tx_ptextlist.prototype.backend.extbase
    backendConfig {
        repositoryClassName = Tx_JdavSv_Domain_Repository_AccommodationRepository
    }
    
    
    
    fields {
    
        accommodation {
            table = __self__
            field = __object__
        }

        name {
        	table = __self__
        	field = name
        }

        address {
        	table = __self__
        	field = address
        }

        url {
        	table = __self__
        	field = url
        }

        email {
        	table = __self__
        	field = email
        }

        telephone {
        	table = __self__
        	field = telephone
        }

    }
    
    
    
    columns {

        10 {
            fieldIdentifier = name
            columnIdentifier = name
            label = Name
        }

        20 {
        	fieldIdentifier = email
        	columnIdentifier = email
        	label = E-Mail
        }

        25 {
        	fieldIdentifier = url
        	columnIdentifier = url
        	label = WWW
        }

        30 {
        	fieldIdentifier = address
        	columnIdentifier = address
        	label = Adresse
        }

        40 {
        	fieldIdentifier = telephone
        	columnIdentifier = telephone
        	label = Telefon
        }
    
    }

}



# We copy list config above into pt_extlist namespace
plugin.tx_ptextlist.settings.listConfig.accommodationAdmin < plugin.tx_jdavsv.settings.listConfig.accommodationAdmin