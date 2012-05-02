<?php

/*
 * This file is part of the Josser package.
 *
 * (C) Alan Gabriel Bem <alan.bem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Josser\Client\Protocol;

use Josser\Client\Response\ResponseInterface;
use Josser\Client\Request\RequestInterface;

use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Encoder\DecoderInterface;

/**
 * Protocol interface for Josser client.
 *
 * @author Alan Gabriel Bem <alan.bem@gmail.com>
 */
interface Protocol
{
    /**
     * Create response object.
     *
     * @abstract
     * @param mixed $dto
     * @return \Josser\Client\Response\ResponseInterface
     */
    function createResponse($dto);

    /**
     * Retrieve encoder object.
     *
     * @abstract
     * @return \Symfony\Component\Serializer\Encoder\EncoderInterface
     */
    function getEncoder();

    /**
     * Retrieve decoder object.
     *
     * @abstract
     * @return \Symfony\Component\Serializer\Encoder\DecoderInterface
     */
    function getDecoder();

    /**
     * Retrieve JSON-RPC version.
     *
     * @abstract
     * @return string
     */
    function getVersion();

    /**
     * Checks whether request matches response.
     *
     * @abstract
     * @param \Josser\Client\Request\RequestInterface $request
     * @param \Josser\Client\Response\ResponseInterface $response
     * @return boolean
     */
    function match(RequestInterface $request, ResponseInterface $response);

    /**
     * Return DTO of a request.
     *
     * @abstract
     * @param \Josser\Client\Request\RequestInterface $request
     * @return mixed
     */
    function getRequestDataTransferObject(RequestInterface $request);

    /**
     * Check whether $request is a notification.
     *
     * @abstract
     * @param \Josser\Client\Request\RequestInterface $request
     * @return boolean
     */
    function isNotification(RequestInterface $request);

    /**
     * Generate random string for a response identifier.
     *
     * @abstract
     * @return mixed
     */
    function generateRequestId();
}
