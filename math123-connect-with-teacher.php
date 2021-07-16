<?php
/**
 * Plugin Name: Math123 Connect With Teacher
 * Description: Плагин WordPress для отправки сообщения преподавателю. Слайды берутся из постов о преподах  () , для вставки плагина на странице использовать шорт-код [Math123_Connect_With_Teacher  id_teach="not"]Связаться с руководителем[/Math123_Connect_With_Teacher], в атрибутах надо указать идентификато записи о преподавателе, между тегами текст для кнопки
 * Plugin URI: https://github.com/AndreyTSpb/Math123-Connect-With-Teacher.git
 * Author: Andrey Tynyany
 * Version: 1.0.1
 * Author URI: http://tynyany.ru
 *
 * Text Domain: Math123 Connect With Teacher
 *
 * @package Math123 Connect With Teacher
 */

defined('ABSPATH') or die('No script kiddies please!');

define( 'WPM123CWT_VERSION', '1.0.4' );

define( 'WPM123CWT_REQUIRED_WP_VERSION', '5.5' );

define( 'WPM123CWT_PLUGIN', __FILE__ );

define( 'WPM123CWT_PLUGIN_BASENAME', plugin_basename( WPM123CWT_PLUGIN ) );

define( 'WPM123CWT_PLUGIN_NAME', trim( dirname( WPM123CWT_PLUGIN_BASENAME ), '/' ) );

define( 'WPM123CWT_PLUGIN_DIR', untrailingslashit( dirname( WPM123CWT_PLUGIN ) ) );

define( 'WPM123CWT_PLUGIN_URL',
    untrailingslashit( plugins_url( '', WPM123CWT_PLUGIN ) )
);
/**
 * Подцепляем шорт код
 */
add_shortcode('Math123_Connect_With_Teacher','math123_connect_with_teacher');

/**
 * Основная функция, к котоой привязывается шорткод
 *
 * @param $atts - атрибутты для сликслайдера
 * @param $content - Заголовок слайдера
 * @return string - возващает html код на страницу
 */
function math123_connect_with_teacher($atts, $content){

    /**
     * Подключение стиля
     */
    //add_action('wp_head', 'math123_connect_with_teacher_add_style');

    /**
     * Подключили скрипт для обработки
     */
    //add_action('wp_footer', 'math123_connect_with_teacher_add_script');

    /**
     * Получаем посты со слайдами , из категории слайдер
     */
    $post_1 = math123_connect_with_teacher_get_posts((!empty($atts['id_teach']))?$atts['id_teach']:'218');
    /**
     * Array (
     *  [name] => Трошин Константин Леонидович
     *  [img] => http://math123-wordpress.local/wp-content/uploads/2021/03/dino_1.png
     *  [education] =>
     *  [info] =>
     *  [email] =>
     * )
     */

    $data = array(
        'title'      => (!empty($content))?$content:'связаться с руководителем',
        'id_teach'   => (!empty($atts['id_teach']))?$atts['id_teach']:'218',
        'img'        => $post_1['img'],
        'teach_name' => $post_1['name'],
        'education'  => $post_1['education'],
        'info'       => $post_1['info'],
        'email'      => $post_1['email']
    );

    /**
     * Получим буфиризованый вывод шаблона
     */
    $html = math123_connect_with_teacher_get_html($data);
    /**
     * Возвращаем html на страницу
     */
    return $html;
}

/**
 * Подключение стилей
 */
function math123_connect_with_teacher_add_style(){
    /**
     * пока не используем, используем базовые стили
     */
    //$src = plugins_url( 'путь к стилю', __FILE__ );
    //exit($src);
    //wp_register_style( 'math123_slider_in_header_style', $src);

    //wp_enqueue_style( 'math123_slider_in_header_style');
}

/**
 * Подключение скриптов
 */
function math123_connect_with_teacher_add_script(){
    /**
     * регистрация скриптов
     */
    wp_register_script('math123_connect_with_teacher_script', plugins_url( 'assets/script.js', __FILE__ ));


    /**
     * подключение скриптов
     */
    wp_enqueue_script('math123_connect_with_teacher_script');

    /**
     * Параматры для скрипта
     */
    //wp_localize_script( 'math123_connect_with_teacher_script', 'Obj', $math123sa_data );
}

/**
 * Получение постов
 */
function math123_connect_with_teacher_get_posts($id_post){
    $post = get_post($id_post);
    /*Имя берем из названия поста*/
    $name      = $post->post_title;
    /*фото препода*/
    $img       = get_field('Fotoprepodavatelya', $id_post)['url'];
    /*Образование преподавателя*/
    $education = strip_tags(get_field('obrazovanie', $id_post));
    /*Информация о пеподе*/
    $info      = strip_tags(get_field('info', $id_post));
    /*email*/
    $email     = get_field('email', $id_post);


    return array('name' => $name, 'img' => $img, 'education' => $education, 'info' => $info, 'email' => $email);
}


/**
 * Размещение данных в шаблоне
 */
function math123_connect_with_teacher_get_html($data){
    ob_start();
    include WPM123CWT_PLUGIN_DIR."/tp/template.php";
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}