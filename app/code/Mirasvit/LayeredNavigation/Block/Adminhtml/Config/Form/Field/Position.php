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
 * @version   2.0.14
 * @copyright Copyright (C) 2021 Mirasvit (https://mirasvit.com/)
 */


declare(strict_types=1);

namespace Mirasvit\LayeredNavigation\Block\Adminhtml\Config\Form\Field;

use Magento\Framework\View\Element\Html\Select;
use Mirasvit\LayeredNavigation\Model\Config\HorizontalBarConfigProvider;

class Position extends Select
{
    public function setInputName(string $value): self
    {
        return $this->setData('name', $value);
    }

    public function _toHtml(): string
    {
        $this->addOption(HorizontalBarConfigProvider::POSITION_SIDEBAR, (string)__('Sidebar (default)'));
        $this->addOption(HorizontalBarConfigProvider::POSITION_HORIZONTAL, (string)__('Horizontal'));
        $this->addOption(HorizontalBarConfigProvider::POSITION_BOTH, (string)__('Sidebar & Horizontal'));

        return parent::_toHtml();
    }
}