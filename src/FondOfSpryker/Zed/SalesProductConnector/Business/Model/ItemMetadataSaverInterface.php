<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Business\Model;

use Generated\Shared\Transfer\SaveOrderTransfer;
use Spryker\Zed\SalesProductConnector\Business\Model\ItemMetadataSaverInterface as SprykerItemMetadataSaverInterface;

interface ItemMetadataSaverInterface extends SprykerItemMetadataSaverInterface
{
    /**
     * @param \Generated\Shared\Transfer\SaveOrderTransfer $saveOrderTransfer

     * @return \Generated\Shared\Transfer\SaveOrderTransfer
     */
    public function saveItemsMetadataFromOrderTransfer(SaveOrderTransfer $saveOrderTransfer): SaveOrderTransfer;
}
