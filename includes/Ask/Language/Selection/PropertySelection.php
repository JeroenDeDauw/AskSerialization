<?php

namespace Ask\Language\Selection;

use DataValues\DataValue;

/**
 * Selection request specifying that the values for a property should be obtained.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @since 0.1
 *
 * @file
 * @ingroup Ask
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class PropertySelection extends SelectionRequest implements \Ask\Immutable {

	/**
	 * The property for which to select values.
	 *
	 * @since 0.1
	 *
	 * @var DataValue
	 */
	protected $propertyId;

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 *
	 * @param DataValue $propertyId
	 */
	public function __construct( DataValue $propertyId ) {
		$this->propertyId = $propertyId;
	}

	/**
	 * @see Typeable::getType
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public function getType() {
		return SelectionRequest::TYPE_PROP;
	}

	/**
	 * Returns the print request's property.
	 *
	 * @since 0.1
	 *
	 * @return DataValue
	 */
	public function getPropertyId() {
		return $this->propertyId;
	}

	/**
	 * @see ArrayValueProvider::getArrayValue
	 *
	 * @since 0.1
	 *
	 * @return mixed
	 */
	public function getArrayValue() {
		return array(
			'property' => $this->propertyId->toArray()
		);
	}

	/**
	 * @see Comparable::equals
	 *
	 * @since 0.1
	 *
	 * @param mixed $mixed
	 *
	 * @return boolean
	 */
	public function equals( $mixed ) {
		return $mixed instanceof PropertySelection
			&& $this->propertyId->equals( $mixed->getPropertyId() );
	}

	/**
	 * @see Hashable::getHash
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public function getHash() {
		return sha1( $this->getType() . $this->propertyId->getHash() );
	}

}
