<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Business;

use Generated\Shared\Transfer\SaveOrderTransfer;
use Spryker\Zed\SalesProductConnector\Business\SalesProductConnectorFacadeInterface as SprykerSalesProductConnectorFacadeInterface;

interface SalesProductConnectorFacadeInterface extends SprykerSalesProductConnectorFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\SaveOrderTransfer $saveOrderTransfer
     *
     * @return \Generated\Shared\Transfer\SaveOrderTransfer
     */
    public function saveOrderItemMetadataFromOrderTransfer(SaveOrderTransfer $saveOrderTransfer): SaveOrderTransfer;
}
