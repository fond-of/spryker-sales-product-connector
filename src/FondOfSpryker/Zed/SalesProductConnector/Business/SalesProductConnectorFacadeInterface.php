<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Business;

use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;
use Spryker\Zed\SalesProductConnector\Business\SalesProductConnectorFacadeInterface as SprykerSalesProductConnectorFacadeInterface;

interface SalesProductConnectorFacadeInterface extends SprykerSalesProductConnectorFacadeInterface
{
    /**
     * @param \FondOfSpryker\Zed\SalesProductConnector\Business\OrderTransfer $orderTransfer
     */
    public function saveOrderItemMetadataFromOrderTransfer(OrderTransfer $orderTransfer, SaveOrderTransfer $saveOrderTransfer): void;

}
