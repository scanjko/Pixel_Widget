<?php

declare(strict_types=1);

namespace Pixel\Widget\Block\Adminhtml\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class ContentBox extends Template implements BlockInterface
{
    protected $_template = "widget/slider_homepage.phtml";
}
