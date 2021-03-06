<?php
/**
 * Mirasvit
 *
 * This source file is subject to the Mirasvit Software License, which is available at https://mirasvit.com/license/.
 * Do not edit or add to this file if you wish to upgrade the to newer versions in the future.
 * If you wish to customize this module for your needs.
 * Please refer to http://www.magentocommerce.com for more information.
 *
 * @category  Mirasvit
 * @package   mirasvit/module-navigation
 * @version   1.1.0
 * @copyright Copyright (C) 2020 Mirasvit (https://mirasvit.com/)
 */



namespace Mirasvit\Brand\Plugin\Frontend\Magento\Catalog\Model\Layer\CollectionFilterInterface;

use Magento\Catalog\Model\Layer\CollectionFilterInterface;
use Magento\Framework\Registry;
use Mirasvit\Brand\Model\Config\BrandPageConfig;
use Mirasvit\Brand\Service\BrandActionService;

class FilterByBrandPlugin
{
    /**
     * @var Registry
     */
    private $registry;

    private $brandActionService;

    public function __construct(
        Registry $registry,
        BrandActionService $brandActionService
    ) {
        $this->registry           = $registry;
        $this->brandActionService = $brandActionService;
    }

    /**
     * Filter product collection
     *
     * @param CollectionFilterInterface                               $subject
     * @param callable                                                $proceed
     * @param \Magento\Catalog\Model\ResourceModel\Product\Collection $collection
     * @param array                                                   $args
     */
    public function aroundFilter(CollectionFilterInterface $subject, callable $proceed, $collection = null, ...$args)
    {
        $proceed($collection, ...$args);

        if ($this->brandActionService->isBrandViewPage()
            && ($brandData = $this->registry->registry(BrandPageConfig::BRAND_DATA))
            && ($brandAttribute = $brandData[BrandPageConfig::BRAND_ATTRIBUTE])
            && ($attributeOptionId = $brandData[BrandPageConfig::ATTRIBUTE_OPTION_ID])
        ) {
            // for brand page we register the root category ID, so products' request_paths are empty
            // to fix this we set flag and add URL-rewrite on category 0
            $collection->setFlag('do_not_use_category_id', true);
            $collection->addUrlRewrite(0);

            $collection->addFieldToFilter(
                $brandAttribute,
                $attributeOptionId
            );
        }
    }
}
