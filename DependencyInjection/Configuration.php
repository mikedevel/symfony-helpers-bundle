<?php

namespace Mikedevs\VersionerBundle\DependencyInjection;

use Mikedevs\VersionerBundle\Form\Type\PasswordType;
use Mikedevs\VersionerBundle\Form\Type\UserType;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('mkdev_versioner');
        // Keep compatibility with symfony/config < 4.2
        if (\method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $rootNode = $treeBuilder->root('mkdev_versioner');
        }

        $rootNode
            ->children()
            ->scalarNode('yml_path')
            ->isRequired()
            ->end()
            ->scalarNode('property_name')
            ->isRequired()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
