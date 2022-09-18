<?php

namespace Pixel\Widget\Plugin;

class Widget
{
    /**
     * @param \Magento\Widget\Model\Widget $subject
     * @param $type
     * @param array $params
     * @param bool $asIs
     * @return array
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * This fix isssue when inserting media widget instance in CMS block
     */
    public function beforeGetWidgetDeclaration(
        \Magento\Widget\Model\Widget $subject,
        $type,
        $params = [],
        $asIs = true
    ) {
        foreach ($params as $name => $value) {
            if (preg_match('/(___directive\/)([a-zA-Z0-9,_-]+)/', $value, $matches)) {
                $directive = base64_decode(strtr($matches[2], '-_,', '+/='));
                $params[$name] = str_replace(['{{media url="', '"}}'], ['/media/', ''], $directive);
            }
        }
        return [$type, $params, $asIs];
    }
}
