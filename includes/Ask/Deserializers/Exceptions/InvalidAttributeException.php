<?php

namespace Ask\Deserializers\Exceptions;

use Ask\Deserializers\Deserializer;

/**
 * @since 0.1
 *
 * @file
 * @ingroup Ask
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class InvalidAttributeException extends DeserializationException {

	protected $attributeName;

	/**
	 * @param string $attributeName
	 * @param Deserializer $deserializer
	 * @param string $message
	 * @param \Exception $previous
	 */
	public function __construct( $attributeName, Deserializer $deserializer, $message = '', \Exception $previous = null ) {
		$this->attributeName = $attributeName;

		parent::__construct( $deserializer, $message, $previous );
	}

	/**
	 * @return string
	 */
	public function getAttributeName() {
		return $this->attributeName;
	}

}