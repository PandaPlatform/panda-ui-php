<?php

/*
 * This file is part of the Panda framework Ui component.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Panda\Ui\Contracts\Handlers;

use DOMElement;
use DOMException;
use DOMNode;
use Exception;
use InvalidArgumentException;

/**
 * Interface DOMHandlerInterface
 *
 * @package Panda\Ui\Contracts\Handlers
 *
 * @version 0.1
 */
interface DOMHandlerInterface
{
    /**
     * Get or set an attribute for a given DOMElement.
     *
     * @param DOMElement $element  The DOMElement to handle.
     * @param string     $name     The name of the attribute.
     * @param mixed      $value    If the value is null or false, the value is considered negative and the attribute
     *                             will be removed. If the value is empty string(default, null is not included), the
     *                             function will return the attribute value. Otherwise, the attribute will be set with
     *                             the new value and the new value will be returned.
     * @param bool       $validate Validate the attribute value for special cases (id)
     *
     * @return string If the given value is empty, it returns True if the attribute is removed, False otherwise.If the
     *                given value is empty, it returns True if the attribute is removed, False otherwise. It returns
     *                the new attribute otherwise.
     *
     * @throws Exception
     */
    public function attr(DOMElement &$element, $name, $value = '', $validate = false);

    /**
     * Get or set a series of attributes (in the form of an array) into a DOMElement
     *
     * @param DOMElement $element The DOMElement to handle.
     * @param array      $value   The array of attributes.
     *                            The key is the name of the attribute.
     *
     * @return array
     */
    public function attrs(DOMElement &$element, $value = []);

    /**
     * Append a value into an attribute with a space between.
     *
     * @param DOMElement $element The DOMElement to handle.
     * @param string     $name    The name of the attribute
     * @param string     $value   The value to be appended.
     *
     * @return string The new attribute value.
     *
     * @throws Exception
     */
    public function appendAttr(DOMElement &$element, $name, $value);

    /**
     * Inserts a data-[name] attribute.
     * It supports single value or an array of values.
     *
     * @param DOMElement $element The DOMElement to handle.
     * @param string     $name    The data name of the attribute (data-[name])
     * @param mixed      $value   The data value.
     *                            It can be a single value or an array of values.
     *
     * @return bool|string TRUE or the new value on success, FALSE on failure.
     */
    public function data(DOMElement &$element, $name, $value = []);

    /**
     * Sets or gets the nodeValue of the given DOMElement.
     * Returns the old value or the DOMElement if value is set.
     *
     * @param DOMElement $element The DOMElement to handle.
     * @param string     $value   The value to be set.
     *                            If empty, the element's value will be returned.
     *
     * @return string The node value (old or new).
     */
    public function nodeValue(DOMElement &$element, $value = null);

    /**
     * Append an element as a child.
     *
     * @param DOMElement $element    The DOMElement to handle.
     * @param DOMNode    $newElement The child element.
     *
     * @return DOMElement
     *
     * @throws InvalidArgumentException
     */
    public function append(DOMElement &$element, &$newElement);

    /**
     * Prepends (appends first in the list) a DOMElement.
     *
     * @param DOMElement $element    The DOMElement to handle.
     * @param DOMNode    $newElement The child element.
     *
     * @return DOMElement
     *
     * @throws InvalidArgumentException
     */
    public function prepend(DOMElement &$element, &$newElement);

    /**
     * Remove the DOMItem from the parent
     *
     * @param DOMElement $element The DOMElement to handle.
     *
     * @throws DOMException
     */
    public function remove(DOMElement &$element);

    /**
     * Replace the DOMItem.
     *
     * @param DOMElement $element    The DOMElement to handle.
     * @param DOMNode    $newElement The item to replace.
     *
     * @return DOMElement The new element.
     *
     * @throws DOMException
     */
    public function replace(DOMElement &$element, &$newElement);
}