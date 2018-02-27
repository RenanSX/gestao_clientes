<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login_Controller/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//Rotas para Usuários
$route['usuario']['GET'] = 'Usuario_Controller/cadastrar';
$route['usuario/cadastrar']['GET'] = 'Usuario_Controller/cadastrar';
$route['usuario/cadastrar']['POST'] = 'Usuario_Controller/cadastrar_salvar';
$route['usuario/consultar']['GET'] = 'Usuario_Controller/consultar';
$route['usuario/excluir/(:num)']['GET'] = 'Usuario_Controller/excluir/$1';
$route['usuario/alterar/(:num)']['GET'] = 'Usuario_Controller/alterar/$1';
$route['usuario/alterar/(:num)']['POST'] = 'Usuario_Controller/alterar_salvar/$1';


//Rotas para clientes
$route['cliente']['GET'] = 'Cliente_Controller/cadastrar';
$route['cliente/cadastrar']['GET'] = 'Cliente_Controller/cadastrar';
$route['cliente/cadastrar']['GET'] = 'Cliente_Controller/buscarAtividade';
$route['cliente/cadastrar']['POST'] = 'Cliente_Controller/cadastrar_salvar';
$route['cliente/consultar']['GET'] = 'Cliente_Controller/consultar';
$route['cliente/excluir/(:num)']['GET'] = 'Cliente_Controller/excluir/$1';
$route['cliente/alterar/(:num)']['GET'] = 'Cliente_Controller/alterar/$1';
$route['cliente/alterar/(:num)']['POST'] = 'Cliente_Controller/alterar_salvar/$1';


//Rotas ramo de atividades
$route['ramo_atividade']['GET'] = 'Ramo_Atividade_Controller/cadastrar';
$route['ramo_atividade/cadastrar']['GET'] = 'Ramo_Atividade_Controller/cadastrar';
$route['ramo_atividade/cadastrar']['POST'] = 'Ramo_Atividade_Controller/cadastrar_salvar';
$route['ramo_atividade/consultar']['GET'] = 'Ramo_Atividade_Controller/consultar';
$route['ramo_atividade/excluir/(:num)']['GET'] = 'Ramo_Atividade_Controller/excluir/$1';
$route['ramo_atividade/alterar/(:num)']['GET'] = 'Ramo_Atividade_Controller/alterar/$1';
$route['ramo_atividade/alterar/(:num)']['POST'] = 'Ramo_Atividade_Controller/alterar_salvar/$1';


//Meio de contato
$route['meio_contato']['GET'] = 'Meio_Contato_Controller/cadastrar';
$route['meio_contato/cadastrar']['GET'] = 'Meio_Contato_Controller/cadastrar';
$route['meio_contato/cadastrar']['POST'] = 'Meio_Contato_Controller/cadastrar_salvar';
$route['meio_contato/consultar']['GET'] = 'Meio_Contato_Controller/consultar';
$route['meio_contato/excluir/(:num)']['GET'] = 'Meio_Contato_Controller/excluir/$1';
$route['meio_contato/alterar/(:num)']['GET'] = 'Meio_Contato_Controller/alterar/$1';
$route['meio_contato/alterar/(:num)']['POST'] = 'Meio_Contato_Controller/alterar_salvar/$1';


//Registro
$route['registro/cadastrar']['GET'] = 'Registro_Controller/cadastrar';
$route['registro/cadastrar']['GET'] = 'Registro_Controller/consultarMeioContato';
$route['registro/cadastrar']['POST'] = 'Registro_Controller/cadastrar_salvar';


//Relatório
$route['relatorio/cliente']['GET'] = 'Relatorio_Controller/consultar_cliente';
$route['relatorio/contato_cliente']['GET'] = 'Relatorio_Controller/contato_cliente';
$route['relatorio/contato_cliente']['POST'] = 'Relatorio_Controller/consultar_contato_cliente';


//Login e logout
$route['login']['GET'] = 'Index_Controller/index';
$route['home']['GET'] = 'Home_Controller/index';
$route['login']['GET'] = 'Login_Controller/index';
$route['home/logout']['GET'] = 'Home_Controller/logout';