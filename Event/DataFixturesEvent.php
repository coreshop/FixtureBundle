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

namespace CoreShop\Bundle\FixtureBundle\Event;

use CoreShop\Bundle\FixtureBundle\Fixture\DataFixturesExecutorInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Contracts\EventDispatcher\Event;

class DataFixturesEvent extends Event
{
    public function __construct(private ObjectManager $manager, private $fixturesType, private $logger = null)
    {
    }

    /**
     * Gets the entity manager.
     *
     * @return ObjectManager
     */
    public function getObjectManager()
    {
        return $this->manager;
    }

    /**
     * Gets the type of data fixtures.
     *
     * @return string
     */
    public function getFixturesType()
    {
        return $this->fixturesType;
    }

    /**
     * Adds a message to the logger.
     *
     * @param string $message
     */
    public function log($message)
    {
        if (null !== $this->logger) {
            $logger = $this->logger;

            if (is_callable($logger)) {
                $logger($message);
            }
        }
    }

    /**
     * Checks whether this event is raised for data fixtures contain the main data for an application.
     *
     * @return bool
     */
    public function isMainFixtures()
    {
        return DataFixturesExecutorInterface::MAIN_FIXTURES === $this->getFixturesType();
    }

    /**
     * Checks whether this event is raised for data fixtures contain the demo data for an application.
     *
     * @return bool
     */
    public function isDemoFixtures()
    {
        return DataFixturesExecutorInterface::DEMO_FIXTURES === $this->getFixturesType();
    }
}
