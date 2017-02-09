<?php

namespace App\Http\Composers;


use Illuminate\View\View;

class BaseComposer
{

    /**
     * Global backend composer.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $moduleName = explode('.', $view->getName())[1];
        $view->with('moduleName', $moduleName);
    }


}