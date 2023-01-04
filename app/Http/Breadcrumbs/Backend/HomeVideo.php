<?php

Breadcrumbs::register('admin.homevideos.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.homevideos.management'), route('admin.homevideos.index'));
});

Breadcrumbs::register('admin.homevideos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.homevideos.index');
    $breadcrumbs->push(trans('menus.backend.homevideos.create'), route('admin.homevideos.create'));
});

Breadcrumbs::register('admin.homevideos.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.homevideos.index');
    $breadcrumbs->push(trans('menus.backend.homevideos.edit'), route('admin.homevideos.edit', $id));
});
