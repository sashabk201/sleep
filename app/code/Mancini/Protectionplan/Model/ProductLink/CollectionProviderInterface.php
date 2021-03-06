<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Mancini\Protectionplan\Model\ProductLink;

/**
 * Interface \Magento\Catalog\Model\ProductLink\CollectionProviderInterface
 *
 */
interface CollectionProviderInterface
{
    /**
     * Get linked products
     *
     * @param \Magento\Catalog\Model\Product $product
     * @return \Magento\Catalog\Model\Product[]
     */
    public function getLinkedProducts($product);
}
