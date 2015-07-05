<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
	public function __construct($environment, $debug) {
		date_default_timezone_set('Asia/Kolkata');
		parent::__construct($environment, $debug);
	}

	public function registerBundles()
	{
		$bundles = array(
				new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
				new Symfony\Bundle\SecurityBundle\SecurityBundle(),
				new Symfony\Bundle\TwigBundle\TwigBundle(),
				new Symfony\Bundle\MonologBundle\MonologBundle(),
				new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
				new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
				new Home\MyPractoBundle\HomeMyPractoBundle(),
				new FOS\RestBundle\FOSRestBundle(),
				new JMS\SerializerBundle\JMSSerializerBundle(),
            	new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
				new Symfony\Bundle\AsseticBundle\AsseticBundle(),
				new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
				);

		if (in_array($this->getEnvironment(), array('dev', 'test'))) {
			$bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
			$bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
			$bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
		}

		return $bundles;
	}

	public function registerContainerConfiguration(LoaderInterface $loader)
	{
		$loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
	}
}
