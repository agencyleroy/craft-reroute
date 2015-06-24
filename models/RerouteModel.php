<?php

namespace Craft;

class RerouteModel extends BaseModel
{
	protected function defineAttributes()
	{
		return array(
			'id' => AttributeType::Number,
			'oldUrl' => array(AttributeType::String, 'required' => true),
			'targetEntry' => array(AttributeType::Number, 'required' => true),
			'targetLocale' => array(AttributeType::String, 'required' => true),
			'method' => array(AttributeType::Number, 'required' => true)
		);
	}
}