<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Business\Model;

use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;
use Spryker\Zed\SalesProductConnector\Business\Model\ItemMetadataSaver as SprykerItemMetadataSaver;


class ItemMetadataSaver extends  SprykerItemMetadataSaver implements ItemMetadataSaverInterface
{
    /**
     * @param \FondOfSpryker\Zed\SalesProductConnector\Business\Model\OrderTransfer $orderTransfer
     *
     * @return void
     *
     * @throws \Throwable
     */
    public function saveItemsMetadataFromOrderTransfer(SaveOrderTransfer $saveOrderTransfer): SaveOrderTransfer
    {
        $this->handleDatabaseTransaction(function () use ($saveOrderTransfer) {
            foreach ($saveOrderTransfer->getOrderItems() as $item) {
                $this->saveItemMetadata($item);
            }
        });

        return $saveOrderTransfer;
    }
}
