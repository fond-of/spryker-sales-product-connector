<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Business;

use Generated\Shared\Transfer\SaveOrderTransfer;
use Spryker\Zed\SalesProductConnector\Business\SalesProductConnectorFacade as SprykerSalesProductConnectorFacade;

/**
 * @method \FondOfSpryker\Zed\SalesProductConnector\Business\SalesProductConnectorBusinessFactory getFactory()
 */
class SalesProductConnectorFacade extends SprykerSalesProductConnectorFacade implements SalesProductConnectorFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\SaveOrderTransfer $saveOrderTransfer
     *
     * @return \Generated\Shared\Transfer\SaveOrderTransfer
     */
    public function saveOrderItemMetadataFromOrderTransfer(SaveOrderTransfer $saveOrderTransfer): SaveOrderTransfer
    {
        /** @var \FondOfSpryker\Zed\SalesProductConnector\Business\Model\ItemMetadataSaverInterface $itemMetadataSaver */
        $itemMetadataSaver = $this->getFactory()->createItemMetadataSaver();

        return $itemMetadataSaver->saveItemsMetadataFromOrderTransfer($saveOrderTransfer);
    }
}
