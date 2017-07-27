<?php

if (preg_match('/response_404$/', $_SERVER['REQUEST_URI'])) {
    header("HTTP/1.0 404 Not Found");
    print 'Page not found error';
} else {
    print 'Page without errors';
}
