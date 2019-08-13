<?php

namespace FondOfSpryker\Zed\SalesProductConnector\Communication\Plugin\Sales;

use FondOfSpryker\Zed\Sales\Dependency\Plugin\OrderCreatePluginInterface;
use FondOfSpryker\Zed\SalesExtension\Dependency\Plugin\SalesOrderPostCreatePluginInterface;
use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\SalesExtension\Dependency\Plugin\OrderPostSavePluginInterface;

/**
 *
 * @method \FondOfSpryker\Zed\SalesProductConnector\Business\SalesProductConnectorFacadeInterface getFacade()
 * @method \Spryker\Zed\SalesProductConnector\Persistence\SalesProductConnectorQueryContainerInterface getQueryContainer()
 */
class ItemMetadataSaverPlugin extends AbstractPlugin implements OrderPostSavePluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     * @param \Generated\Shared\Transfer\SaveOrderTransfer $saveOrderTransfer
     */
    public function execute(SaveOrderTransfer $saveOrderTransfer, QuoteTransfer $quoteTransfer): SaveOrderTransfer
    {
        return $this->getFacade()->saveOrderItemMetadataFromOrderTransfer($saveOrderTransfer);
    }
}
