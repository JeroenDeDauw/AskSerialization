<?php

namespace Ask\Language\Description;

use DataValues\DataValue;
use InvalidArgumentException;

/**
 * Description of one data value, or of a range of data values.
 *
 * Technically this usually corresponds to nominal predicates or to unary
 * concrete domain predicates in OWL which are parametrised by one constant
 * from the concrete domain.
 *
 * In RDF, concrete domain predicates that define ranges (like "greater or
 * equal to") are not directly available.
 *
 * Based on SMWValueDescription
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
final class ValueDescription extends Description implements \Ask\Immutable {

	// This list has values backwards compatible with SMW_CMP_.
	const COMP_EQUAL = 1;
	const COMP_LEQ = 2; // Less than or equal
	const COMP_MEQ = 3; // Greater than or equal
	const COMP_NEQ = 4; // Not equal
	const COMP_LIKE = 5;
	const COMP_NLIKE = 6; // Not like
	const COMP_LESS = 7; // Strictly less than
	const COMP_MORE = 8; // Strictly more than

	/**
	 * The value to compare to.
	 *
	 * @since 0.1
	 *
	 * @var DataValue
	 */
	protected $value;

	/**
	 * The comparator to use to determine if the value matches.
	 *
	 * @since 0.1
	 *
	 * @var int
	 */
	protected $comparator;

	/**
	 * @since 0.1
	 *
	 * @param DataValue $value
	 * @param int $comparator
	 *
	 * @throws InvalidArgumentException
	 */
	public function __construct( DataValue $value, $comparator = self::COMP_EQUAL ) {
		if ( $comparator < self::COMP_EQUAL || $comparator > self::COMP_MORE ) {
			throw new InvalidArgumentException( 'Invalid comparator specified' );
		}

		$this->value = $value;
		$this->comparator = $comparator;
	}

	/**
	 * Returns the value to compare against.
	 *
	 * @since 0.1
	 *
	 * @return DataValue
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Returns the comparator to use when comparing against the value.
	 *
	 * @since 0.1
	 *
	 * @return int
	 */
	public function getComparator() {
		return $this->comparator;
	}

	/**
	 * {@inheritdoc}
	 *
	 * @since 0.1
	 *
	 * @return integer
	 */
	public function getSize() {
		return 1;
	}

	/**
	 * {@inheritdoc}
	 *
	 * @since 0.1
	 *
	 * @return integer
	 */
	public function getDepth() {
		return 0;
	}

	/**
	 * {@inheritdoc}
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public function getType() {
		return 'valueDescription';
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
		return $mixed instanceof ValueDescription
			&& $this->comparator === $mixed->getComparator()
			&& $this->value->equals( $mixed->getValue() );
	}

	/**
	 * @see Hashable::getHash
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public function getHash() {
		return sha1( $this->getType() . $this->value->getHash() . $this->comparator );
	}

}
