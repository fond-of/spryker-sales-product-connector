<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Business;

use Generated\Shared\Transfer\OrderTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\SalesProductConnector\Business\SalesProductConnectorBusinessFactory getFactory()
 */
class SalesProductConnectorFacade extends AbstractFacade implements SalesProductConnectorFacadeInterface
{

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     */
    public function saveOrderItemMetadataFromOrderTransfer(OrderTransfer $orderTransfer): void
    {
        $this->getFactory()
            ->createItemMetadataSaver()
            ->saveItemsMetadata2($orderTransfer);
    }
}
