<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Zed\ProductOfferValidityDataImport\Communication\Plugin;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Generated\Shared\Transfer\DataImporterReaderConfigurationTransfer;
use Generated\Shared\Transfer\DataImporterReportTransfer;
use Generated\Shared\Transfer\ProductOfferTransfer;
use Spryker\Zed\ProductOfferValidityDataImport\Communication\ProductOfferValidityDataImportPlugin;
use Spryker\Zed\ProductOfferValidityDataImport\ProductOfferValidityDataImportConfig;

/**
 * Auto-generated group annotations
 *
 * @group Zed
 * @group ProductOfferValidityDataImport
 * @group Communication
 * @group Plugin
 * @group ProductOfferValidityDataImportPluginTest
 * Add your own group annotations below this line
 */
class ProductOfferValidityDataImportPluginTest extends Unit
{
    protected const PRODUCT_OFFER_REFERENCE_VALUE = 'offer10';

    /**
     * @var \SprykerTest\Zed\ProductOfferValidityDataImport\ProductOfferValidityDataImportCommunicationTester
     */
    protected $tester;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->tester->ensureProductOfferValidityTableIsEmpty();
    }

    /**
     * @return void
     */
    public function testImportImportsData(): void
    {
        $this->tester->haveProductOffer([
            ProductOfferTransfer::PRODUCT_OFFER_REFERENCE => static::PRODUCT_OFFER_REFERENCE_VALUE,
        ]);

        $dataImporterReaderConfigurationTransfer = (new DataImporterReaderConfigurationTransfer())
            ->setFileName(codecept_data_dir() . 'import/product_offer_validity.csv');

        $dataImportConfigurationTransfer = (new DataImporterConfigurationTransfer())
            ->setReaderConfiguration($dataImporterReaderConfigurationTransfer);

        // Act
        $productOfferValidityDataImportPlugin = new ProductOfferValidityDataImportPlugin();
        $dataImporterReportTransfer = $productOfferValidityDataImportPlugin->import($dataImportConfigurationTransfer);

        // Assert
        $this->assertInstanceOf(DataImporterReportTransfer::class, $dataImporterReportTransfer);
        $this->tester->assertProductOfferValidityDatabaseTablesContainsData();
    }

    /**
     * @return void
     */
    public function testGetImportTypeReturnsTypeOfImporter(): void
    {
        // Act
        $productOfferValidityDataImportPlugin = new ProductOfferValidityDataImportPlugin();

        // Assert
        $this->assertSame(ProductOfferValidityDataImportConfig::IMPORT_TYPE_PRODUCT_OFFER_VALIDITY, $productOfferValidityDataImportPlugin->getImportType());
    }
}
