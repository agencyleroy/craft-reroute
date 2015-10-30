<?php

namespace Craft;

class ReroutePlugin extends BasePlugin
{
	public function getName()
	{
		return Craft::t('Reroute');
	}

	public function getVersion()
	{
		return '1.0.3';
	}

	public function getDeveloper()
	{
		return 'Trevor Davis';
	}

	public function getDeveloperUrl()
	{
		return 'http://trevordavis.net';
	}

	public function hasCpSection()
	{
		return true;
	}

	public function registerCpRoutes()
	{
		return array(
			'reroute\/new' => 'reroute/_form',
			'reroute\/(?P<rerouteId>\d+)' => 'reroute/_form',
		);
	}

	public function init() {
		if(craft()->request->isSiteRequest()) {
			$url = craft()->request->getUrl();
      $fullUrl = craft()->request->getHostInfo().craft()->request->getRequestUri();

      $shortReroute = craft()->reroute->getByUrl($url);
      $fullReroute = craft()->reroute->getByUrl($fullUrl);

      $reroute = ($fullReroute) ? $fullReroute : $shortReroute;

			if ($reroute) {
				$entry = craft()->entries->getEntryById($reroute['targetEntry'], $reroute['targetLocale']);

				if ($entry) {
					craft()->request->redirect($entry->getUrl(), true, $reroute['method']);
				}
			}
		}
	}
}