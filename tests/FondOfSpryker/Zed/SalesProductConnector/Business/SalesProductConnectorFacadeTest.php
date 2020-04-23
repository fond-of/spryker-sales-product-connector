<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\SalesProductConnector\Business\Model\ItemMetadataSaverInterface;
use Generated\Shared\Transfer\SaveOrderTransfer;

class SalesProductConnectorFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\SalesProductConnector\Business\SalesProductConnectorFacade
     */
    protected $salesProductConnectorFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\SalesProductConnector\Business\SalesProductConnectorBusinessFactory
     */
    protected $salesProductConnectorBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\SaveOrderTransfer
     */
    protected $saveOrderTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\SalesProductConnector\Business\Model\ItemMetadataSaverInterface
     */
    protected $itemMetadataSaverInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->salesProductConnectorBusinessFactoryMock = $this->getMockBuilder(SalesProductConnectorBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->saveOrderTransferMock = $this->getMockBuilder(SaveOrderTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->itemMetadataSaverInterfaceMock = $this->getMockBuilder(ItemMetadataSaverInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->salesProductConnectorFacade = new SalesProductConnectorFacade();
        $this->salesProductConnectorFacade->setFactory($this->salesProductConnectorBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testSaveOrderItemMetadataFromOrderTransfer(): void
    {
        $this->salesProductConnectorBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createItemMetadataSaver')
            ->willReturn($this->itemMetadataSaverInterfaceMock);

        $this->itemMetadataSaverInterfaceMock->expects($this->atLeastOnce())
            ->method('saveItemsMetadataFromOrderTransfer')
            ->with($this->saveOrderTransferMock)
            ->willReturn($this->saveOrderTransferMock);

        $this->assertInstanceOf(
            SaveOrderTransfer::class,
            $this->salesProductConnectorFacade->saveOrderItemMetadataFromOrderTransfer(
                $this->saveOrderTransferMock
            )
        );
    }
}
