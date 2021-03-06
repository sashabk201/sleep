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



namespace Mirasvit\LayeredNavigation\Model\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class SeoConfig
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * SeoConfig constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return int
     */
    public function getMeta()
    {
        return (int) $this->scopeConfig->getValue('mst_nav/seo/robots', ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return int
     */
    public function getCanonical()
    {
        return (int) $this->scopeConfig->getValue('mst_nav/seo/canonical', ScopeInterface::SCOPE_STORE);
    }
}
