<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Michael Knoll <mimi@kaktusteam.de>, MKLV GbR
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Controller for the Export actions
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Controller_ExportController extends Tx_JdavSv_Controller_AbstractController {

	/**
	 * Holds instance of PDF export view
	 *
	 * @var Tx_JdavSv_View_PdfExportView
	 */
	protected $view;



	/**
	 * Holds default PDF export settings from pt_extlist
	 *
	 * @var array
	 */
	protected $defaultPdfExportSettings;



	protected function initializeAction() {
		$this->defaultPdfExportSettings = $this->settings['export']['pdfExport'];
	}



	/**
	 * Exports list of registrations for participants
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 */
	public function exportRegistrationsListForParticipantsAction(Tx_JdavSv_Domain_Model_Event $event) {

		$listContext = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
			$this->settings['listConfig']['registrationsParticipants'], 'registrationsParticipants'
		);

		$listContext->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('filterbox1')
				->getFilterByFilterIdentifier('registrationsByEventFilter')->setEventUid($event->getUid());

		// TODO put configuration into TS
		$this->defaultPdfExportSettings['templatePath'] = 'typo3conf/ext/jdav_sv/Resources/Private/Templates/Export/exportRegistrationsListForParticipants.html';
		$this->defaultPdfExportSettings['fileName'] = 'teilnehmerliste-' . $event->getCategory()->getShortcut() . $event->getAccreditationNumber();
		$this->defaultPdfExportSettings['paperOrientation'] = 'landscape';

		$this->view->setConfiguration($this->defaultPdfExportSettings);

		$list = $listContext->getList(true);
		$rendererChain = $listContext->getRendererChain();
		$listData = $rendererChain->renderList($list->getListData());
		$listCaptions = $rendererChain->renderCaptions($list->getListHeader());

		$this->view->assign('event', $event);
		$this->view->assign('listData', $listData);
		$this->view->assign('listCaptions', $listCaptions);
		$this->view->assign('listHeader', $listContext->getList()->getListHeader());

		return $this->view->render();
	}



	/**
	 * Exports list of registrations for teamers
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 */
	public function exportRegistrationsListForTeamersAction(Tx_JdavSv_Domain_Model_Event $event) {
		// TODO put configuration into TS
		$this->defaultPdfExportSettings['templatePath'] = 'typo3conf/ext/jdav_sv/Resources/Private/Templates/Export/exportRegistrationsListForTeamers.html';
		$this->defaultPdfExportSettings['fileName'] = 'teilnehmerliste-' . $event->getCategory()->getShortcut() . $event->getAccreditationNumber();
		$this->defaultPdfExportSettings['paperOrientation'] = 'landscape';

		$this->view->setConfiguration($this->defaultPdfExportSettings);

		$this->view->assign('event', $event);

		return $this->view->render();
	}



	/**
	 * Exports invoice for given registration
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration
	 */
	public function exportInvoiceForRegistrationAction(Tx_JdavSv_Domain_Model_Registration $registration) {
		// TODO put configuration into TS
		$this->defaultPdfExportSettings['templatePath'] = 'typo3conf/ext/jdav_sv/Resources/Private/Templates/Export/registrationInvoice.html';
		$this->defaultPdfExportSettings['fileName'] = 'rechnung-' . $registration->getEvent()->getCategory()->getShortcut() . $registration->getEvent()->getAccreditationNumber();
		$this->defaultPdfExportSettings['paperOrientation'] = 'portrait';
		$this->defaultPdfExportSettings['paperSize'] = 'A4';

		$this->view->setConfiguration($this->defaultPdfExportSettings);
		$this->view->assign('registration', $registration);

		return $this->view->render();
	}



	/**
	 * Exports debit information for given registration
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration
	 */
	public function exportRegistrationDebitInformationAction(Tx_JdavSv_Domain_Model_Registration $registration) {
		// TODO put configuration into TS
		$this->defaultPdfExportSettings['templatePath'] = 'typo3conf/ext/jdav_sv/Resources/Private/Templates/Export/registrationDebitInformation.html';
		$this->defaultPdfExportSettings['fileName'] = 'lastschriftinfo-' . $registration->getEvent()->getCategory()->getShortcut() . $registration->getEvent()->getAccreditationNumber();
		$this->defaultPdfExportSettings['paperOrientation'] = 'portrait';
		$this->defaultPdfExportSettings['paperSize'] = 'A4';
		$this->defaultPdfExportSettings['paperSize'] = 'A4';

		$registration->setDebitInformationSent(TRUE);
		$this->registrationRepository->update($registration);
		$this->persistenceManager->persistAll();

		$this->view->setConfiguration($this->defaultPdfExportSettings);
		$this->view->assign('registration', $registration);
		$this->view->assign('currentDate', time());

		return $this->view->render();
	}



	/**
	 * Overwrites view class name used for this controller
	 * as we want to have PDF export.
	 *
	 * @return string
	 */
	protected function getTsViewClassName() {
		return 'Tx_JdavSv_View_PdfExportView';
	}

}