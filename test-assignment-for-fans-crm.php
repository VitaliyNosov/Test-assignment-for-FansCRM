<?php
/*
 * Тестовое задание для WordPress Developer
 * Разработка и оптимизация.
 */

// Задача 1: Оптимизация загрузки более 20 медиафайлов
/**
 * Оптимизация медиафайлов для улучшения производительности:
 * 1. **Использование плагинов**:
 *    - WP Smush, Imagify или ShortPixel для автоматической оптимизации изображений.
 * 2. **Lazy Loading**:
 *    - Включить отложенную загрузку через `wp_lazy_loading_enabled` или плагины, такие как WP Rocket.
 * 3. **CDN**:
 *    - Подключить CDN-сеть (например, Cloudflare) для доставки изображений.
 * 4. **Формат изображений**:
 *    - Конвертировать изображения в WebP для уменьшения их размера.
 */
add_filter('wp_lazy_loading_enabled', '__return_true');

// Задача 2: Повышение Google PageSpeed и оптимизация JS
/**
 * Алгоритм действий:
 * 1. **Анализ проблем**: Использовать Google PageSpeed Insights.
 * 2. **Оптимизация JS**:
 *    - Сократить и объединить JS-файлы с помощью плагинов (например, Autoptimize).
 *    - Включить асинхронную загрузку `<script>` с `defer` или `async`.
 * 3. **Кеширование**:
 *    - Включить кеширование страниц и браузера с WP Super Cache, W3 Total Cache или серверными методами.
 * 4. **Удаление лишних скриптов**:
 *    - Использовать `wp_dequeue_script` для отключения ненужных скриптов на определенных страницах.
 * 5. **Минимизация CSS и HTML**.
 */
function optimize_remove_unnecessary_js() {
    if (!is_admin()) {
        wp_dequeue_script('unused-script'); // Удалить ненужные скрипты
    }
}
add_action('wp_enqueue_scripts', 'optimize_remove_unnecessary_js');

// Задача 3: Отправка email с GET-параметром
if (isset($_GET['param'])) {
    $to = 'example@example.com';
    $subject = 'GET Parameter Received';
    $message = 'Received parameter: ' . sanitize_text_field($_GET['param']);
    wp_mail($to, $subject, $message);
}

// Задача 4: Реализация Lazy Loading
/**
 * В WordPress 5.5+ lazy loading активируется по умолчанию.
 * Для ручного использования: добавляем атрибут loading="lazy" к изображениям.
 */
function custom_lazy_load_images($content) {
    $content = str_replace('<img ', '<img loading="lazy" ', $content);
    return $content;
}
add_filter('the_content', 'custom_lazy_load_images');

// Задача 5: Перевод сайта на несколько языков
/**
 * Шаги для мультиязычности:
 * 1. **Выбор плагина**: Polylang, WPML или TranslatePress.
 * 2. **Установка и настройка плагина**: Добавление языков и переводов.
 * 3. **Создание языковых версий страниц**:
 *    - Полный перевод контента.
 * 4. **Оптимизация URL**: Настроить SEO-дружественные URL для каждого языка.
 * 5. **Перевод тем и плагинов**: Использование `.po/.mo` файлов через Poedit.
 * 6. **Тестирование**: Проверка переключения языков и корректности переводов.
 */
?>
