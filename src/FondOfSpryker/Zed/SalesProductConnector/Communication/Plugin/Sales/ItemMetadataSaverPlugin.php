<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Communication\Plugin\Sales;

use FondOfSpryker\Zed\Sales\Dependency\Plugin\OrderCreatePluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 *
 * @method \FondOfSpryker\Zed\SalesProductConnector\Business\SalesProductConnectorFacadeInterface getFacade()
 * @method \Spryker\Zed\SalesProductConnector\Persistence\SalesProductConnectorQueryContainerInterface getQueryContainer()
 */
class ItemMetadataSaverPlugin extends AbstractPlugin implements OrderCreatePluginInterface
{
    /**
     * @param \FondOfSpryker\Zed\SalesProductConnector\Communication\Plugin\OrderTransfer $orderTransfer
     */
    public function saveOrder(OrderTransfer $orderTransfer)
    {
        $this->getFacade()->saveOrderItemMetadataFromOrderTransfer($orderTransfer);
    }
}
