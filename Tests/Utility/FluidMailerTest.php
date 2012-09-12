<?php

class Tx_JdavSv_Tests_Utility_FluidMailerTest extends Tx_PtExtbase_Tests_Unit_AbstractBaseTestcase {

	/**
	 * @test
	 */
	public function setToSetsGivenAddressInMailer() {
		$addressArray = array('mimi@kaktusteam.de' => 'Michael Knoll');
		new t3lib_mail_Message();
		$mailingServiceMock = $this->getMock('T3libMailerMock', array('setTo'), array(), '', FALSE);
		$mailingServiceMock->expects($this->once())->method('setTo')->with($addressArray);

		$fluidMailer = new Tx_JdavSv_Utility_FluidMailer();
		$fluidMailer->injectT3MailMessage($mailingServiceMock);
		$fluidMailer->setTo($addressArray);
	}

}


class T3libMailerMock extends t3lib_mail_Message {

	// Disable constructor
	public function __destruct() {}

}
?>