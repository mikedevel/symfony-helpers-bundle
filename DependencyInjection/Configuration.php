<?php

namespace Mikedevs\HelpersBundle\DependencyInjection;

use Mikedevs\HelpersBundle\Form\Type\PasswordType;
use Mikedevs\HelpersBundle\Form\Type\UserType;
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
        $treeBuilder = new TreeBuilder('mikedevs_helper');
        // Keep compatibility with symfony/config < 4.2
        if (\method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $rootNode = $treeBuilder->root('mikedevs_helper');
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
