<?php
declare(strict_types=1);

use Products\Application\Action\Product\ProductAdd;
use Products\Application\Action\Product\ProductUpdate;
use Products\Application\Action\Product\ProductDelete;
use Products\Application\Action\Product\ProductList;

$app->post('/api/v1/product', ProductAdd::class);
$app->put('/api/v1/product/{id}', ProductUpdate::class);
$app->delete('/api/v1/product/{id}', ProductDelete::class);
$app->get('/api/v1/product', ProductList::class);