<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');





$route['default_controller'] = "transparencia";

$route['login'] = 'login/login';

$route['camaras/condeuba/(:any)'] = 'camaras/condeuba/$1';

$route['portal'] = 'portal';

$route['portal/cidades/camaras/(:any)'] = 'cidades/camaras/$1';

$route['usuario/(:num)'] = "usuario/usuario/$1";

$route['financeiro/(:num)'] = "financeiro/financeiro/$1";

$route['entidade/(:num)'] = "entidade/entidade/$1";

$route['vereador/(:num)'] = "vereador/vereador/$1";

$route['noticia/(:num)'] = "noticia/noticia/$1";

$route['slides/(:num)'] = "slides/slides/$1";

$route['aviso/(:num)'] = "aviso/aviso/$1";

$route['Um3Um/(:num)'] = "Um3Um/Um3Um/$1";

$route['relatorios/(:num)'] = "relatorios/relatorios/$1";

$route['vereadores/(:num)'] = "vereadores/vereadores/$1";

$route['comissao/(:num)'] = "comissao/comissao/$1";

$route['categorias/(:num)'] = "categorias/categorias/$1";

$route['secretarias/(:num)'] = "secretarias/secretarias/$1";

$route['ldo/(:num)'] = "ldo/ldo/$1";
$route['Diaria/(:num)'] = "Diaria/Diaria/$1";
$route['licitacao/(:num)'] = "licitacao/licitacao/$1";
$route['licitacao/cadastroVencedor/(:num)'] = "licitacao/cadastroVencedor/$1";

$route['loa/(:num)'] = "loa/loa/$1";

$route['ppa/(:num)'] = "ppa/ppa/$1";

$route['rreo/(:num)'] = "rreo/rreo/$1";
$route['diario/(:num)'] = "diario/diario/$1";





$route['publicacoes/(:num)'] = "publicacoes/publicacoes/$1";

$route['publicar/(:num)'] = "publicar/publicar/$1";

$route['galeria/(:num)'] = "galeria/galeria/$1";

$route['diariooficial'] = "portal/diariotemp";

$route['portal-transparencia'] = "portal/transptemp";

$route['404_override'] = '';

$route['exibe-noticia/(:num)'] = 'portal/view_noticia/$1';
$route['exibir-publicacao/(:num)'] = 'camaras/condeuba/documento/$1';





