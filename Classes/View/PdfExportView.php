<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2010-2011 punkt.de GmbH - Karlsruhe, Germany - http://www.punkt.de
 *  Authors: Daniel Lienert, Michael Knoll, Christoph Ehscheidt
 *  All rights reserved
 *
 *  For further information: http://extlist.punkt.de <extlist@punkt.de>
 *
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Implements a view for rendering PDF
 *
 * @author Daniel Lienert
 * @author Michael Knoll <mimi@kaktusteam.de>
 * @package View
 */
class Tx_JdavSv_View_PdfExportView extends Tx_PtExtlist_View_Export_PdfListView {

	/**
	 * Filename for PDF export
	 *
	 * @var string
	 */
	protected $filename;



	/**
	 * Sets configuration by given configuration array
	 *
	 * @param array $configuration
	 */
	public function setConfiguration(array $configuration) {
		$this->templatePath = $configuration['templatePath'];
		Tx_PtExtbase_Assertions_Assert::isNotEmptyString($this->templatePath, array('message' => 'No template path given for fluid export! 1284621481'));
		$this->setTemplatePathAndFilename(t3lib_div::getFileAbsFileName($this->templatePath));

		$this->paperSize = strtolower($configuration['paperSize']);
		Tx_PtExtbase_Assertions_Assert::isNotEmptyString($this->paperSize, array('message' => 'No PaperSize given for the PDF output! 1322585559'));

		$this->paperOrientation = $configuration['paperOrientation'];
		Tx_PtExtbase_Assertions_Assert::isInArray($this->paperOrientation, array('portrait', 'landscape'), array('message' => 'The Orientation must either be portrait or landscape! 1322585560'));

		$this->cssFilePath = t3lib_div::getFileAbsFileName($configuration['cssFilePath']);
		Tx_PtExtbase_Assertions_Assert::isTrue(file_exists($this->cssFilePath), array('message' => 'The CSS File with the filename ' . $this->cssFilePath . ' can not be found. 1322587627'));

		$this->dompdfSourcePath = t3lib_div::getFileAbsFileName($configuration['dompdfSourcePath']);
		Tx_PtExtbase_Assertions_Assert::isTrue(is_dir($this->dompdfSourcePath), array('message' => 'DomPdf source in path ' . $this->dompdfSourcePath . ' was not found. 1322753515'));
		$this->dompdfSourcePath = substr($this->dompdfSourcePath,-1,1) == '/' ? $this->dompdfSourcePath : $this->dompdfSourcePath . '/';

		$this->fileName = $configuration['fileName'];
	}



	/**
	 * Overwriting the render method to generate a CSV output
	 *
	 * @return  void (never returns)
	 */
	public function render() {
		$this->loadDomPDFClasses();

		$this->assign('csssFilePath', $this->cssFilePath);
		$html = Tx_PtExtlist_View_Export_AbstractExportView::render();
		ob_clean();

		$dompdf = new DOMPDF();
		$dompdf->set_paper($this->paperSize, $this->paperOrientation);
		$dompdf->load_html($html);
		$dompdf->render();

		$dompdf->stream($this->fileName . '.pdf', array("Attachment" => 0));

		exit();
	}

}
?>