#############################################
# JDAV Baden-Württemberg Schulungsverwaltung
#
# Base Configuration for Extension
#
# @author Michael Knoll <mimi@kaktusteam.de>
#############################################

## Basic settings
plugin.tx_jdavsv.settings {
	feUsersPid = {$plugin.tx_jdavsv.settings.feUsersPid}
	loginRedirectController = EventAdmin
	loginRedirectAction = list
}


## fe_group to be set for new fe_user
plugin.tx_jdavsv.settings {

	fe_users {
		defaultFeGroup = {$plugin.tx_jdavsv.settings.fe_users.defaultFeGroup}
	}

}


## Copy pt_extlist export settings into our namespace
plugin.tx_jdavsv.settings.export.pdfExport < plugin.tx_ptextlist.settings.export.exportConfigs.pdfExport



## CSS inclusion
page.includeCSS {
    jdavSvBootstrapCss = EXT:jdav_sv/Resources/Public/Css/bootstrap.css
}



## Some header data
page.headerData.1 = TEXT
page.headerData.1.value (
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
)