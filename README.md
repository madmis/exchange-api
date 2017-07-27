# Exchange Api

Common functions for cryptocurrency exchange api

[![SensioLabsInsight][sensiolabs-insight-image]][sensiolabs-insight-link]
[![Build Status][testing-image]][testing-link]
[![Coverage Status][coverage-image]][coverage-link]
[![Latest Stable Version][stable-image]][package-link]
[![Total Downloads][downloads-image]][package-link]
[![License][license-image]][license-link]


## License

MIT License


## Contributing
[create issue](https://github.com/madmis/exchange-api/issues/new) 
or [create pull request](https://github.com/madmis/exchange-api/compare)


## Install
    
    composer require madmis/exchange-api

## Running the tests
To run the tests, you'll need to install [phpunit](https://phpunit.de/). 
Easiest way to do this is through composer.

    composer install

Tests required running php built in server on 8000 port.

    php -S localhost:8000 {project_dir}/tests/web/router.php

### Running Unit tests

    php vendor/bin/phpunit -c phpunit.xml.dist


[testing-link]: https://travis-ci.org/madmis/exchange-api
[testing-image]: https://travis-ci.org/madmis/exchange-api.svg?branch=master

[sensiolabs-insight-link]: https://insight.sensiolabs.com/projects/877c7e0c-85f3-4d94-b9fb-27dab723dcba
[sensiolabs-insight-image]: https://insight.sensiolabs.com/projects/877c7e0c-85f3-4d94-b9fb-27dab723dcba/mini.png

[package-link]: https://packagist.org/packages/madmis/exchange-api
[downloads-image]: https://poser.pugx.org/madmis/exchange-api/downloads
[stable-image]: https://poser.pugx.org/madmis/exchange-api/v/stable
[license-image]: https://poser.pugx.org/madmis/exchange-api/license
[license-link]: https://packagist.org/packages/madmis/exchange-api

[coverage-link]: https://coveralls.io/github/madmis/exchange-api?branch=master
[coverage-image]: https://coveralls.io/repos/github/madmis/exchange-api/badge.svg?branch=master

