<?php
/**
 * Rave <https://github.com/Classicodr/rave-core>
 * Copyright (C) 2016 Rave Team
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

use rave\core\Config;
use rave\core\database\DriverFactory;
use rave\core\DB;

/**
 * Some useful constants
 */

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('APP', ROOT . DS . 'app' . DS);

/**
 * Include the autoloader
 */

require_once ROOT . '/vendor/autoload.php';

Config::addArray([
        'debug' => true,
        'datasources' => [
            'test' => [
                'driver' => 'MySQLPDO',
                'host' => 'localhost',
                'database' => 'my_app',
                'login' => 'my_app',
                'password' => 'secret',
                /**
                 * Uncomment if the datasource is not on the default port
                 */
                //'port'=> 'non_standart_port_number'
            ]
        ],
        'error' => [
            '500' => '/internal-server-error',
            '404' => '/not-found',
            '403' => '/forbidden'
        ],
    ]
);

DB::set(DriverFactory::get('test'));