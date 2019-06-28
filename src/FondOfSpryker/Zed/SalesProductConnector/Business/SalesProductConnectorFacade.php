<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Business;

use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;
use Spryker\Zed\SalesProductConnector\Business\SalesProductConnectorFacade as SprykerSalesProductConnectorFacade;

/**
 * @method \FondOfSpryker\Zed\SalesProductConnector\Business\SalesProductConnectorBusinessFactory getFactory()
 */
class SalesProductConnectorFacade extends SprykerSalesProductConnectorFacade implements SalesProductConnectorFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     */
    public function saveOrderItemMetadataFromOrderTransfer(OrderTransfer $orderTransfer, SaveOrderTransfer $saveOrderTransfer): void
    {
        $this->getFactory()
            ->createItemMetadataSaver()
            ->saveItemsMetadataFromOrderTransfer($orderTransfer, $saveOrderTransfer);
    }
}
