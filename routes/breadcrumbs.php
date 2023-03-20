<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
BreadCrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Dashboard > User
Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User', route('admin.user.index'));
});

// Dashboard > Role
Breadcrumbs::for('role', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Role', route('admin.role.index'));
});
