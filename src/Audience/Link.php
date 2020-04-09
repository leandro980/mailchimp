<?php
/**
 * Project: szopen\mailchimp
 *
 * Author: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Created: 09/04/2020 15:07
 */

namespace Szopen\Mailchimp\Audience;

/**
 * Class Link
 *
 * @package Szopen\Mailchimp\Audience
 */
class Link
{
    /**
     * @const
     */
    const METHOD_GET     = 'GET',
          METHOD_POST    = 'POST',
          METHOD_PUT     = 'PUT',
          METHOD_PATCH   = 'PATCH',
          METHOD_DELETE  = 'DELETE',
          METHOD_OPTIONS = 'OPTIONS',
          METHOD_HEAD    = 'HEAD';

    /**
     * As with an HTML 'rel' attribute, this describes the type of link.
     *
     * @var string
     */
    private $rel;

    /**
     * This property contains a fully-qualified URL that can be called to retrieve
     * the linked resource or perform the linked action.
     *
     * @var string
     */
    private $href;

    /**
     * The HTTP method that should be used when accessing the URL defined in 'href'.
     * Possible Values:
     * - GET
     * - POST
     * - PUT
     * - PATCH
     * - DELETE
     * - OPTIONS
     * - HEAD
     *
     * @var string
     */
    private $method;

    /**
     * For GETs, this is a URL representing the schema that the response should conform to.
     *
     * @var string
     */
    private $targetSchema;

    /**
     * For HTTP methods that can receive bodies (POST and PUT),
     * this is a URL representing the schema that the body should conform to.
     *
     * @var string
     */
    private $schema;

    /**
     * As with an HTML 'rel' attribute, this describes the type of link.
     *
     * @return string
     */
    public function getRel(): string
    {
        return $this->rel;
    }

    /**
     * This property contains a fully-qualified URL that can be called to retrieve
     * the linked resource or perform the linked action.
     *
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * The HTTP method that should be used when accessing the URL defined in 'href'.
     * Possible Values:
     * - GET
     * - POST
     * - PUT
     * - PATCH
     * - DELETE
     * - OPTIONS
     * - HEAD
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * For GETs, this is a URL representing the schema that the response should conform to.
     *
     * @return string
     */
    public function getTargetSchema(): string
    {
        return $this->targetSchema;
    }

    /**
     * For HTTP methods that can receive bodies (POST and PUT),
     * this is a URL representing the schema that the body should conform to.
     *
     * @return string
     */
    public function getSchema(): string
    {
        return $this->schema;
    }

}