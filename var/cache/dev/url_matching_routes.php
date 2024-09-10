<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/facturas' => [[['_route' => 'facturas_listar', '_controller' => 'App\\Controller\\FacturaController::listarFacturas'], null, ['GET' => 0], null, false, false, null]],
        '/facturas/nueva' => [[['_route' => 'facturas_nueva', '_controller' => 'App\\Controller\\FacturaController::crearFactura'], null, ['POST' => 0], null, false, false, null]],
        '/usuarios/nuevo' => [[['_route' => 'usuarios_nuevo', '_controller' => 'App\\Controller\\UsuarioController::nuevo'], null, ['POST' => 0], null, false, false, null]],
        '/usuarios' => [[['_route' => 'usuario_lista', '_controller' => 'App\\Controller\\UsuarioController::lista'], null, ['GET' => 0], null, false, false, null]],
        '/productos' => [[['_route' => 'listar_productos', '_controller' => 'App\\Controller\\ProductoController::listarProductos'], null, ['GET' => 0], null, false, false, null]],
        '/productos/nuevo' => [[['_route' => 'nuevo_producto', '_controller' => 'App\\Controller\\ProductoController::crearProducto'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/csv/ordenar(?'
                    .'|/([^/]++)/([^/]++)(*:235)'
                    .'|\\-burbuja/([^/]++)/([^/]++)(*:270)'
                .')'
                .'|/productos/([^/]++)(?'
                    .'|(*:301)'
                    .'|/eliminar(*:318)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        235 => [[['_route' => 'csv_ordenar', '_controller' => 'App\\Controller\\LecturaCsvController::ordenar'], ['filename', 'posicion'], ['GET' => 0], null, false, true, null]],
        270 => [[['_route' => 'csv_ordenar_burbuja', '_controller' => 'App\\Controller\\LecturaCsvController::ordenarBurbuja'], ['filename', 'posicion'], ['GET' => 0], null, false, true, null]],
        301 => [[['_route' => 'detalle_producto', '_controller' => 'App\\Controller\\ProductoController::detalleProducto'], ['id'], ['GET' => 0], null, false, true, null]],
        318 => [
            [['_route' => 'eliminar_producto', '_controller' => 'App\\Controller\\ProductoController::eliminarProducto'], ['id'], ['DELETE' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
