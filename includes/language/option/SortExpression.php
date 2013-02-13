<?php

namespace Ask\Language\Option;

/**
 * A sort expression.
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
abstract class SortExpression {

	const PROPERTY_VALUE = 'PropertyValue';

	const ASCENDING = 'asc';
	const DESCENDING = 'desc';

	/**
	 * The sort direction.
	 * Either SortExpression::ASCENDING or SortExpression::DESCENDING
	 *
	 * @var string|null
	 */
	protected $direction = null;

	/**
	 * Returns the type of the sort expression.
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public abstract function getType();

	/**
	 * Returns the sort direction.
	 * Either SortExpression::ASCENDING or SortExpression::DESCENDING
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public function getDirection() {
		assert( $this->direction !== null );
		return $this->direction;
	}

}