#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
# 
# Extbase Persistence Configuration
# 
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################

# Set up Extbase Persistence configuration for Extbase Domain Models
config.tx_extbase {
    persistence{
        storagePid = {$plugin.tx_jdavsv.persistence.storagePid}
        enableAutomaticCacheClearing = 1
        updateReferenceIndex = 0
        classes {

        	Tx_JdavSv_Domain_Model_FeUser >
            Tx_JdavSv_Domain_Model_FeUser {
                mapping {
                    tableName = fe_users
                    recordType >
                    columns {
                        lockToDomain.mapOnProperty = lockToDomain
                        tx_jdavsv_is_teamer.mapOnProperty = isTeamer
                        tx_jdavsv_is_trainee.mapOnProperty = isTrainee
                        tx_jdavsv_is_kitchen_group.mapOnProperty = isKitchenGroup
                        tx_jdavsv_is_admin.mapOnProperty = isAdmin
                        tx_jdavsv_is_proofreader.mapOnProperty = isProofreader
                    }
                }
            }

            Tx_Extbase_Domain_Model_FrontendUserGroup >
            Tx_Extbase_Domain_Model_FrontendUserGroup {
                mapping {
                    tableName = fe_groups
                    recordType >
                    columns {
                        lockToDomain.mapOnProperty = lockToDomain
                    }
                }
            }
            
			Tx_JdavSv_Domain_Model_CategoryPrerequisiteFulfillment {
				mapping {
					tableName = tx_jdavsv_domain_model_categoryprerequisitefulfillment
					recordType >
					columns {
						tstamp.mapOnProperty = date
					}
				}
			}

			Tx_JdavSv_Domain_Model_CategoryPrerequisite {
				mapping {
					tableName = tx_jdavsv_domain_model_categoryprerequisite
					recordType >
				}
			}

        }
    }
}



plugin.tx_jdavsv {
   persistence {
		   storagePid = 28
   }
}