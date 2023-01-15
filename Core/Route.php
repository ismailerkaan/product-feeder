<?php

namespace ProductFeeder\Core;

use ProductFeeder\Core\Exceptions\ClassNotFoundException;
use ProductFeeder\Core\Exceptions\MethodNotFoundException;
use ProductFeeder\Core\Exceptions\NotFoundException;
use ProductFeeder\Core\Request;

class Route
{

    public static bool $hasRoute = false;
    public static array $routes = [];

    /**
     * @param $path
     * @param $callback
     */
    public static function get(string $path, $callback): void
    {
        self::$routes['get'][$path] = $callback;
    }

    /**
     * @param string $path
     * @param $callback
     */
    public static function post(string $path, $callback): void
    {
        self::$routes['post'][$path] = $callback;
    }

    private static function replaceRouteAsRegexPattern(string $path): string
    {
        $route = preg_replace('/{.*?}/', '(.+)', str_replace('/', '\/', $path));
        $route = '/' . $route . '/';

        return $route;
    }

    private static function getVariableNamesFromRoute(string $route): ?array
    {
        preg_match_all('/{(.*?)}/', $route, $matched);
        array_shift($matched);

        return $matched[0];
    }

    private static function isRouteMatched($routeRegex, $url): ?array
    {
        $isMatched = preg_match($routeRegex, $url, $params);
        array_shift($params);

        return [$isMatched, $params];
    }


    /**
     * @return void
     * @throws NotFoundException
     */
    public static function execute(): void
    {
        $params = array();

        foreach (self::$routes[Request::getMethod()] as $path => $callback) {
            if (Request::getUrl() == $path) {
                self::callableClass($callback, array());
                exit();
            } elseif (strpos($path, '{') !== false) {
                if (class_exists($callback[0])) {
                    $matched = self::getVariableNamesFromRoute($path);
                    $newRoute = self::replaceRouteAsRegexPattern($path);
                    list($matchResult, $params) = self::isRouteMatched($newRoute, Request::getUrl());

                    if (!$matchResult) {
                        continue;
                    }
                    $params = array_combine($matched, $params);
                }

                self::callableClass($callback, $params);
                exit();
            }
        }

        throw new NotFoundException();
    }

    /**
     * @return void
     * @throws NotFoundException
     */
    public static function hasRoute()
    {
        if (self::$hasRoute === false) {
            throw new NotFoundException();
        }
    }

    /**
     * @param array $callback
     * @param array $params
     * @return void
     * @throws MethodNotFoundException
     * @throws ClassNotFoundException
     */
    public static function callableClass(array $callback, array $params = array())
    {
        if (!class_exists($callback[0])) {
            throw new ClassNotFoundException();
        }

        if (!is_callable($callback)) {
            throw new MethodNotFoundException();
        }

        echo call_user_func_array([$callback[0], $callback[1]], [$params]);
    }
}