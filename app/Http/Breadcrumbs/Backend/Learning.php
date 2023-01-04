<?php

Breadcrumbs::register('admin.learnings.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.learnings.management'), route('admin.learnings.index'));
});

Breadcrumbs::register('admin.learnings.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.learnings.index');
    $breadcrumbs->push(trans('menus.backend.learnings.create'), route('admin.learnings.create'));
});

Breadcrumbs::register('admin.learnings.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.learnings.index');
    $breadcrumbs->push(trans('menus.backend.learnings.edit'), route('admin.learnings.edit', $id));
});
