<?php 

use App\Config\ModelRouter;

ModelRouter::post('/login', 'UserController@login');
ModelRouter::get('/desconectar','UserController@logout');


ModelRouter::get('/login', 'PagViw@login');
ModelRouter::get('/', 'PagViw@home');
ModelRouter::get('/funcionarios', 'PagViw@funcionarios');
ModelRouter::get('/brincos', 'PagViw@brinco');
ModelRouter::get('/colares', 'PagViw@colar');
ModelRouter::get('/pulseiras', 'PagViw@pulseira');



ModelRouter::post('/produto', 'ProdutosController@create');
ModelRouter::post('/produto/apagar/{id}', 'ProdutosController@delete');
ModelRouter::post('/produto/{id}', 'ProdutosController@update');
ModelRouter::get('/produto/categoria/{id}', 'ProdutosController@showCategory');

ModelRouter::post('/usuario', 'UserController@create');
ModelRouter::post('/usuario/delete/{id}', 'UserController@delete');
ModelRouter::post('/usuario/update/{id}', 'UserController@update');




