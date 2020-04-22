<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Business\Model;

use ArrayObject;
use Closure;
use Codeception\Test\Unit;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;
use Propel\Runtime\Connection\ConnectionInterface;
use Spryker\Zed\SalesProductConnector\Dependency\Service\SalesProductConnectorToUtilEncodingInterface;
use Spryker\Zed\SalesProductConnector\Persistence\SalesProductConnectorQueryContainerInterface;

class ItemMetadataSaverTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\SalesProductConnector\Business\Model\ItemMetadataSaver
     */
    protected $itemMetadataSaver;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\SalesProductConnector\Dependency\Service\SalesProductConnectorToUtilEncodingInterface
     */
    protected $salesProductConnectorToUtilEncodingInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\SalesProductConnector\Persistence\SalesProductConnectorQueryContainerInterface
     */
    protected $salesProductConnectorQueryContainerInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\SaveOrderTransfer
     */
    protected $saveOrderTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ItemTransfer
     */
    protected $itemTransferMock;

    /**
     * @var \ArrayObject|\Generated\Shared\Transfer\ItemTransfer[]
     */
    protected $orderItems;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->salesProductConnectorToUtilEncodingInterfaceMock = $this->getMockBuilder(SalesProductConnectorToUtilEncodingInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->salesProductConnectorQueryContainerInterfaceMock = $this->getMockBuilder(SalesProductConnectorQueryContainerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->saveOrderTransferMock = $this->getMockBuilder(SaveOrderTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->itemTransferMock = $this->getMockBuilder(ItemTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->orderItems = new ArrayObject([
           $this->itemTransferMock,
        ]);

        $this->itemMetadataSaver = new class (
            $this->salesProductConnectorToUtilEncodingInterfaceMock,
            $this->salesProductConnectorQueryContainerInterfaceMock,
            $this->saveOrderTransferMock
        ) extends ItemMetadataSaver {
            /**
             * @var \Generated\Shared\Transfer\SaveOrderTransfer
             */
            protected $saveOrderTransfer;

            /**
             * @param \Spryker\Zed\SalesProductConnector\Dependency\Service\SalesProductConnectorToUtilEncodingInterface $utilEncodingService
             * @param \Spryker\Zed\SalesProductConnector\Persistence\SalesProductConnectorQueryContainerInterface $salesProductConnectorQueryContainer
             * @param \Generated\Shared\Transfer\SaveOrderTransfer $saveOrderTransfer
             */
            public function __construct(
                SalesProductConnectorToUtilEncodingInterface $utilEncodingService,
                SalesProductConnectorQueryContainerInterface $salesProductConnectorQueryContainer,
                SaveOrderTransfer $saveOrderTransfer
            ) {
                parent::__construct($utilEncodingService, $salesProductConnectorQueryContainer);
                $this->saveOrderTransfer = $saveOrderTransfer;
            }

            /**
             * @param \Closure $callback
             * @param \Propel\Runtime\Connection\ConnectionInterface|null $connection
             *
             * @return \Generated\Shared\Transfer\SaveOrderTransfer
             */
            protected function handleDatabaseTransaction(Closure $callback, ?ConnectionInterface $connection = null): SaveOrderTransfer
            {
                return $this->saveOrderTransfer;
            }
        };
    }

    /**
     * @return void
     */
    public function testSaveItemsMetadataFromOrderTransfer(): void
    {
        $this->assertInstanceOf(
            SaveOrderTransfer::class,
            $this->itemMetadataSaver->saveItemsMetadataFromOrderTransfer(
                $this->saveOrderTransferMock
            )
        );
    }
}
