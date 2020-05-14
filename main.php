<?php
ob_start();
$msg = '';
$request = $_SERVER['REQUEST_URI'];
/// PHP_URL_SCHEME, PHP_URL_HOST, PHP_URL_PORT, PHP_URL_USER, PHP_URL_PASS, PHP_URL_PATH, PHP_URL_QUERY or PHP_URL_FRAGMEN
$partpage = preg_split("/\//",$request);
$page = parse_url($partpage[1],PHP_URL_PATH);
//explode("/",$request)

include_once('config/config.php');

switch ($page) {
	case '':
    case 'index':
    case '/':
		load_get_or_post('login'); // load_get_or_post('index');
		break;
    case 'singup' :
	case 'register':
        load_get_or_post('singup');
        break;
    case 'login' :
        //require('views/html/login.php');
        load_get_or_post('login');
        break;
    case 'dashboard' :
        load_get_or_post('dashboard',1);
        break;
    
    case 'logout':
        require('views/html/logout.php');
            break;
    case 'profile':
    case 'myprofile':
    case 'my_profile':
           // require('views/html/myprofile.php');
            load_get_or_post('profile',1);
            break;
    case 'update_user':
        load_get_or_post('update_user',1,0);
        break;
    case 'add_post':
    case 'post':
            load_get_or_post('post',1);
            break;
    case 'admin-panel':
    case 'admin':
    case 'cp':
            load_get_or_post('admin-panel',1);
            break;
    case 'test':
           load_get_or_post('test');
                break;
    case '404':
    case '403':
        http_response_code(404);
        load_get_or_post('404');
        break;
    default:
        http_response_code(404);
        load_get_or_post('404');
        break;
}
ob_end_flush();

?>
