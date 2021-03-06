define(['Magento_Ui/js/form/element/abstract'], function (Abstract) 
{
    'use strict';

    return Abstract.extend(
    {
        defaults: 
        {
            cols: 15,
            rows: 2,
            elementTmpl: 'ui/form/element/textarea'
        }
    });
});