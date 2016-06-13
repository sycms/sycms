<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),

            new Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),

            // Sylius Resource and dependencies
            new Bazinga\Bundle\HateoasBundle\BazingaHateoasBundle(),
            new FOS\RestBundle\FOSRestBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle($this),
            new Sylius\Bundle\GridBundle\SyliusGridBundle(),
            new Sylius\Bundle\ResourceBundle\SyliusResourceBundle(),
            new Sylius\Bundle\UiBundle\SyliusUiBundle(),
            new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),
            new winzou\Bundle\StateMachineBundle\winzouStateMachineBundle(),
            new Symfony\Cmf\Bundle\ColumnBrowserBundle\CmfColumnBrowserBundle(),

            // Symfoiny CMF
            new Symfony\Cmf\Bundle\AdminBundle\CmfAdminBundle(),
            new Symfony\Cmf\Bundle\ResourceBundle\CmfResourceBundle(),

        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
