<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'ka1dos_wp1' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'ka1dos_wp1' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'K%*F9bfv&' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'QeN)]}-X>^[yB7aJ|Y;d.v$$b{zTkksOxc#$DGE)W<C/qY$ucc_u*T(B?!sLEFBQ' );
define( 'SECURE_AUTH_KEY',  'VMT*yk+dk*T-i#OVJss. -vOvACJi+M8 f^=Dn;,qL5ZX55lSrM*uAj*cP`QK!wX' );
define( 'LOGGED_IN_KEY',    'mthy-Mj6M3FW*v45O~~nuof^&> +>{pMd:4sl[5>zzL>Ck<N7]?/=Lu4?f_;G HL' );
define( 'NONCE_KEY',        'QV1Io]/S5LIplyf^BF8*sP6-m1u$78MNdI0@W%}gyU>)*v1r$Bj!()i>au)7ZBy ' );
define( 'AUTH_SALT',        'Vmovr[ 3MF>}_|)q:i;VcV8K^Q=+l]W%N3d%mqn`F@1!{xNL`&c jsE#H`keHz#i' );
define( 'SECURE_AUTH_SALT', '#h>?it|DJhEcR>oj>Wm$ohgo]+b>>-o7+~XWaVO!k*0m46NBV7yS14p#(yJ)d}5.' );
define( 'LOGGED_IN_SALT',   'W9o|5uW<K5t4h)HTt5nW jmSG kG51TDup|o}Jia}=lRSMGoBBJ:%MKbXr,41S!I' );
define( 'NONCE_SALT',       'BTHQiscw9+}I1X{CgC{ 3,`!W,MvulbW`{ztgn8oiL[WOywY-Y,~!~0pW>S|2y}I' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';