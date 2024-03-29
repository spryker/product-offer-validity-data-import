<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\ProductOfferValidityDataImport\Business\DataSet;

interface ProductOfferValidityDataSetInterface
{
    /**
     * @var string
     */
    public const FK_PRODUCT_OFFER = 'fk_product_offer';

    /**
     * @var string
     */
    public const PRODUCT_OFFER_REFERENCE = 'product_offer_reference';

    /**
     * @var string
     */
    public const PRODUCT_VALID_FROM = 'valid_from';

    /**
     * @var string
     */
    public const PRODUCT_VALID_TO = 'valid_to';
}
