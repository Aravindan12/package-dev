<?php

namespace Sparkout\AdminDashboard;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sparkout\AdminDashboard\Skeleton\SkeletonClass
 */
class AdminDashboardFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'admin-dashboard';
    }
}
