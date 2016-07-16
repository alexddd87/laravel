<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Главная', '/admin');
});

// Home > About
Breadcrumbs::register('admin-contents', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Страницы', route('admin-contents'));
});
Breadcrumbs::register('admin-contents-edit', function($breadcrumbs)
{
    $breadcrumbs->parent('admin-contents');
    $breadcrumbs->push('Редактирование', route('admin-contents'));
});

Breadcrumbs::register('admin-contents-add', function($breadcrumbs)
{
    $breadcrumbs->parent('admin-contents');
    $breadcrumbs->push('Добавление', route('admin-contents'));
});





// Home > Blog
Breadcrumbs::register('blog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});
