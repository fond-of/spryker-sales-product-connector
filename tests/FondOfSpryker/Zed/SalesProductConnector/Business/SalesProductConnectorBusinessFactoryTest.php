<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\SalesProductConnector\Business\Model\ItemMetadataSaverInterface;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\SalesProductConnector\Dependency\Service\SalesProductConnectorToUtilEncodingInterface;
use Spryker\Zed\SalesProductConnector\Persistence\SalesProductConnectorQueryContainer;
use Spryker\Zed\SalesProductConnector\SalesProductConnectorDependencyProvider;

class SalesProductConnectorBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\SalesProductConnector\Business\SalesProductConnectorBusinessFactory
     */
    protected $salesProductConnectorBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\SalesProductConnector\Persistence\SalesProductConnectorQueryContainer
     */
    protected $salesProductConnectorQueryContainerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\SalesProductConnector\Dependency\Service\SalesProductConnectorToUtilEncodingInterface
     */
    protected $salesProductConnectorToUtilEncodingInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->salesProductConnectorQueryContainerMock = $this->getMockBuilder(SalesProductConnectorQueryContainer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->salesProductConnectorToUtilEncodingInterfaceMock = $this->getMockBuilder(SalesProductConnectorToUtilEncodingInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->salesProductConnectorBusinessFactory = new SalesProductConnectorBusinessFactory();
        $this->salesProductConnectorBusinessFactory->setQueryContainer($this->salesProductConnectorQueryContainerMock);
        $this->salesProductConnectorBusinessFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateItemMetadataSaver(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(SalesProductConnectorDependencyProvider::SERVICE_UTIL_ENCODING)
            ->willReturn($this->salesProductConnectorToUtilEncodingInterfaceMock);

        $this->assertInstanceOf(
            ItemMetadataSaverInterface::class,
            $this->salesProductConnectorBusinessFactory->createItemMetadataSaver()
        );
    }
}
