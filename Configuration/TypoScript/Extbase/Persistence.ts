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
            	newRecordStoragePid = {$plugin.tx_jdavsv.persistence.classes.Tx_JdavSv_Domain_Model_FeUser.newRecordStoragePid}
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
                        tx_jdavsv_sektion.mapOnProperty = sektion
                        tx_jdavsv_dav_nr.mapOnProperty = davNr
                        tx_jdavsv_julei_nr.mapOnProperty = juleiNr
                        tx_jdavsv_sex.mapOnProperty = sex
                        tx_jdavsv_comment.mapOnProperty = comment
                        module_sys_dmail_newsletter.mapOnProperty = newsletterRecipient
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
            	newRecordStoragePid = {$plugin.tx_jdavsv.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
            }

            Tx_JdavSv_Domain_Model_Category {
				newRecordStoragePid = {$plugin.tx_jdavsv.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
			}

			Tx_JdavSv_Domain_Model_CategoryPrerequisite {
				newRecordStoragePid = {$plugin.tx_jdavsv.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
			}

			Tx_JdavSv_Domain_Model_Event {
				newRecordStoragePid = {$plugin.tx_jdavsv.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
			}

            Tx_JdavSv_Domain_Model_Registration {
				newRecordStoragePid = {$plugin.tx_jdavsv.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
			}

			Tx_JdavSv_Domain_Model_Sektion {
				newRecordStoragePid = {$plugin.tx_jdavsv.persistence.classes.Tx_JdavSv_Domain_Model_Sektion.newRecordStoragePid}
			}

			Tx_JdavSv_Domain_Model_CategoryPrerequisiteFulfillment {
				newRecordStoragePid = {$plugin.tx_jdavsv.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
				mapping {
					tableName = tx_jdavsv_domain_model_categoryprerequisitefulfillment
					recordType >
					columns {
						tstamp.mapOnProperty = date
					}
				}
			}

			Tx_JdavSv_Domain_Model_CategoryPrerequisite {
				newRecordStoragePid = {$plugin.tx_jdavsv.persistence.classes.Tx_JdavSv_Domain_Model.newRecordStoragePid}
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