<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Business\Model;

use Generated\Shared\Transfer\OrderTransfer;
use Spryker\Zed\SalesProductConnector\Business\Model\ItemMetadataSaverInterface as SprykerItemMetadataSaverInterface;

interface ItemMetadataSaverInterface extends SprykerItemMetadataSaverInterface
{
    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return void
     */
    public function saveItemsMetadataFromOrderTransfer(OrderTransfer $orderTransfer) : void;
}
