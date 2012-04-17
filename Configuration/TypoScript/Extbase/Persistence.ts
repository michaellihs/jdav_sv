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
            	newRecordStoragePid = {$config.tx_extbase.persistence.classes.Tx_JdavSv_Domain_Model_FeUser.newRecordStoragePid}
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
                        tx_jdavsv_mobile_phone.mapOnProperty = mobilePhone
                        tx_jdavsv_date_of_birth.mapOnProperty = dateOfBirth
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

            Tx_JdavSv_Domain_Model_Accommodation {
            	newRecordStoragePid = {$config.tx_extbase.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
            }

            Tx_JdavSv_Domain_Model_Category {
				newRecordStoragePid = {$config.tx_extbase.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
			}

			Tx_JdavSv_Domain_Model_CategoryPrerequisite {
				newRecordStoragePid = {$config.tx_extbase.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
			}

			Tx_JdavSv_Domain_Model_Event {
				newRecordStoragePid = {$config.tx_extbase.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
			}

            Tx_JdavSv_Domain_Model_Registration {
				newRecordStoragePid = {$config.tx_extbase.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
			}

			Tx_JdavSv_Domain_Model_Sektion {
				newRecordStoragePid = {$config.tx_extbase.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
			}

			Tx_JdavSv_Domain_Model_CategoryPrerequisiteFulfillment {
				newRecordStoragePid = {$config.tx_extbase.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
				mapping {
					tableName = tx_jdavsv_domain_model_categoryprerequisitefulfillment
					recordType >
					columns {
						tstamp.mapOnProperty = date
					}
				}
			}

			Tx_JdavSv_Domain_Model_CategoryPrerequisite {
				newRecordStoragePid = {$config.tx_extbase.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
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
		   storagePid = {$plugin.tx_jdavsv.persistence.storagePid}
   }
}