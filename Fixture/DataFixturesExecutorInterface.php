<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GPLv3 and CCL
 */

declare(strict_types=1);

namespace CoreShop\Bundle\FixtureBundle\Fixture;

use Doctrine\Common\DataFixtures\FixtureInterface;

interface DataFixturesExecutorInterface
{
    /** Data fixtures contain the main data for an application */
    public const MAIN_FIXTURES = 'main';

    /** Data fixtures contain the demo data for an application */
    public const DEMO_FIXTURES = 'demo';

    /**
     * Executes the given data fixtures.
     *
     * @param FixtureInterface[] $fixtures     The list of data fixtures to execute
     * @param string             $fixturesType The type of data fixtures
     */
    public function execute(array $fixtures, $fixturesType);

    /**
     * Sets a logger callback for logging messages when executing data fixtures.
     *
     * @param callable|null $logger
     */
    public function setLogger($logger);
}
