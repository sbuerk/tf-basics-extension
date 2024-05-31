<?php

declare(strict_types=1);

namespace Internal\CustomCommand\Tests\Functional;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

final class DummyTest extends FunctionalTestCase
{
    protected function setUp(): void
    {
        $this->testExtensionsToLoad = array_merge(
            $this->testExtensionsToLoad,
            [
                'sbuerk/tf-basics-extension',
            ]
        );
        parent::setUp();
    }

    /**
     * @test
     */
    public function customCommandExtensionLoaded(): void
    {
        self::assertTrue(ExtensionManagementUtility::isLoaded('tf_basics_extension'));
    }

    /**
     * @test
     */
    public function styleguideNotLoaded(): void
    {
        self::assertFalse(ExtensionManagementUtility::isLoaded('styleguide'));
    }
}