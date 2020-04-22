<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Communication\Plugin\Sales;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\SalesProductConnector\Business\SalesProductConnectorFacadeInterface;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;

class ItemMetadataSaverPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\SalesProductConnector\Communication\Plugin\Sales\ItemMetadataSaverPlugin
     */
    protected $itemMetadataSaverPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\SaveOrderTransfer
     */
    protected $saveOrderTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteTransfer
     */
    protected $quoteTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\SalesProductConnector\Business\SalesProductConnectorFacadeInterface
     */
    protected $salesProductConnectorFacadeInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->saveOrderTransferMock = $this->getMockBuilder(SaveOrderTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteTransferMock = $this->getMockBuilder(QuoteTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->salesProductConnectorFacadeInterfaceMock = $this->getMockBuilder(SalesProductConnectorFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->itemMetadataSaverPlugin = new class (
            $this->salesProductConnectorFacadeInterfaceMock
        ) extends ItemMetadataSaverPlugin {
            /**
             * @var \FondOfSpryker\Zed\SalesProductConnector\Business\SalesProductConnectorFacadeInterface
             */
            protected $salesProductConnectorFacade;

            /**
             * @param \FondOfSpryker\Zed\SalesProductConnector\Business\SalesProductConnectorFacadeInterface $salesProductConnectorFacade
             */
            public function __construct(SalesProductConnectorFacadeInterface $salesProductConnectorFacade)
            {
                $this->salesProductConnectorFacade = $salesProductConnectorFacade;
            }

            /**
             * @return \FondOfSpryker\Zed\SalesProductConnector\Business\SalesProductConnectorFacadeInterface
             */
            public function getFacade(): SalesProductConnectorFacadeInterface
            {
                return $this->salesProductConnectorFacade;
            }
        };
    }

    /**
     * @return void
     */
    public function testExecute(): void
    {
        $this->salesProductConnectorFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('saveOrderItemMetadataFromOrderTransfer')
            ->with($this->saveOrderTransferMock)
            ->willReturn($this->saveOrderTransferMock);

        $this->assertInstanceOf(
            SaveOrderTransfer::class,
            $this->itemMetadataSaverPlugin->execute(
                $this->saveOrderTransferMock,
                $this->quoteTransferMock
            )
        );
    }
}
