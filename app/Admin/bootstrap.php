<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Admin::css(mix('/static/css/build/color.css'));
Admin::css('/static/fonts/mdi-wxss/MDI.css');
Admin::favicon('/favicon.png');
Admin::css('/static/library/highlight.js/styles/vs.css');
Admin::js('/static/js/build/highlight.pack.min.js');
Encore\Admin\Form::forget(['map', 'editor']);
app('view')->prependNamespace('admin', resource_path('views/admin'));

