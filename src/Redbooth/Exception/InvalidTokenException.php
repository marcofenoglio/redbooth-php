<?php 
/**
 * A Redbooth Exception.
 *
 * @author Bruno Pedro <bpedro@redbooth.com>
 */
namespace Redbooth\Exception;

/**
 * An invalid token exception.
 *
 * Exception thrown when any of the OAuth2
 * tokens is considered invalid, e.g. expired
 * access or refresh token.
 *
 * @package Redbooth
 */
class InvalidTokenException extends \Exception
{
}
