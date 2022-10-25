<?php

namespace App\Providers;

use App\Models\Project;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot()
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event){
            $contarProyectos = Project::all()->count();
            $event->menu->add(
                [
                    'text'        => 'Proyectos',
                    'url'         => 'projects',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => $contarProyectos,
                    'label_color' => 'success',
                ],
            );
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
