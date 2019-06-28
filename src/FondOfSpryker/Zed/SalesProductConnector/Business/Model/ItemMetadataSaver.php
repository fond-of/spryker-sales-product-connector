<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Business\Model;

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
    public function saveItemsMetadataFromOrderTransfer(OrderTransfer $orderTransfer): void
    {
        $this->handleDatabaseTransaction(function () use ($orderTransfer) {
            foreach ($orderTransfer->getItems() as $item) {
                $this->saveItemMetadata($item);
            }
        });
    }
}
