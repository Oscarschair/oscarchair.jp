<?php

namespace Laminas\Cache\PatternPluginManager;

use Laminas\Cache\Exception;
use Laminas\Cache\Pattern;
use Laminas\ServiceManager\Exception\InvalidServiceException;

/**
 * Trait providing common logic between FormElementManager implementations.
 *
 * Trait does not define properties, as the properties common between the
 * two versions are originally defined in their parent class, causing a
 * resolution conflict.
 *
 * @deprecated This will be removed in v3.0.0 and should never have been used in upstream projects anyways.
 */
trait PatternPluginManagerTrait
{
    /**
     * Override build to inject options as PatternOptions instance.
     *
     * {@inheritDoc}
     */
    public function build($plugin, array $options = null)
    {
        $options = $options ?? [];

        if ($options === []) {
            return parent::build($plugin);
        }

        $plugin = parent::build($plugin);
        $plugin->setOptions(new Pattern\PatternOptions($options));
        return $plugin;
    }

    /**
     * Validate the plugin is of the expected type (v3).
     *
     * Validates against `$instanceOf`.
     *
     * @param mixed $instance
     * @throws InvalidServiceException
     */
    public function validate($instance)
    {
        if (! $instance instanceof $this->instanceOf) {
            throw new InvalidServiceException(sprintf(
                '%s can only create instances of %s; %s is invalid',
                get_class($this),
                $this->instanceOf,
                (is_object($instance) ? get_class($instance) : gettype($instance))
            ));
        }
    }

    /**
     * Validate the plugin is of the expected type (v2).
     *
     * Proxies to `validate()`.
     *
     * @param mixed $plugin
     * @throws Exception\RuntimeException if invalid
     */
    public function validatePlugin($plugin)
    {
        try {
            $this->validate($plugin);
        } catch (InvalidServiceException $e) {
            throw new Exception\RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
