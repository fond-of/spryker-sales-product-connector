<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Business;

use FondOfSpryker\Zed\SalesProductConnector\Business\Model\ItemMetadataSaver;
use Spryker\Zed\SalesProductConnector\Business\SalesProductConnectorBusinessFactory as SprykerSalesProductConnectorBusinessFactory;
/**
 * @method \Spryker\Zed\SalesProductConnector\Persistence\SalesProductConnectorQueryContainerInterface getQueryContainer()
 */
class SalesProductConnectorBusinessFactory extends SprykerSalesProductConnectorBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\SalesProductConnector\Business\Model\ItemMetadataSaverInterface
     */
    public function createItemMetadataSaver()
    {
        return new ItemMetadataSaver(
            $this->getUtilEncodingService(),
            $this->getQueryContainer()
        );
    }
}
