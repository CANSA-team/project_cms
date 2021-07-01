<?php
declare( strict_types=1 );

namespace Automattic\WooCommerce\GoogleListingsAndAds\Exception;

use LogicException;

/**
 * Class InvalidClass
 *
 * @package Automattic\WooCommerce\GoogleListingsAndAds\Exception
 */
class InvalidClass extends LogicException implements GoogleListingsAndAdsException {

	/**
	 * Create a new instance of the exception when a class should implement an interface but does not.
	 *
	 * @param string $class     The class name.
	 * @param string $interface The interface name.
	 *
	 * @return static
	 */
	public static function should_implement( string $class, string $interface ) {
		return new static(
			sprintf(
				'The class "%s" must implement the "%s" interface.',
				$class,
				$interface
			)
		);
	}

	/**
	 * Create a new instance of the exception when a class should override a method but does not.
	 *
	 * @param string $class  The class name.
	 * @param string $method The method name.
	 *
	 * @return static
	 */
	public static function should_override( string $class, string $method ) {
		return new static(
			sprintf(
				'The class "%s" must override the "%s()" method.',
				$class,
				$method
			)
		);
	}
}
