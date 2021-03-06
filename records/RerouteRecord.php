<?php

namespace Craft;

class RerouteRecord extends BaseRecord
{
	public function getTableName()
	{
		return 'reroute';
	}

	protected function defineAttributes()
	{
		return array(
			'oldUrl' => array(AttributeType::String, 'required' => true),
			'targetEntry' => array(AttributeType::Number, 'required' => true),
			'targetLocale' => array(AttributeType::String, 'required' => true),
			'method' => array(AttributeType::Number, 'required' => true)
		);
	}
}