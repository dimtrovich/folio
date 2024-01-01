<?php

namespace App\Middlewares;

use BlitzPHP\Inertia\Middleware;
use Psr\Http\Message\ServerRequestInterface;

class Inertia extends Middleware
{
    /**
     * Le template racine qui est chargé lors de la première visite de la page.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     */
    protected string $rootView = '\Folio\Admin\Views\app';

    /**
     * Détermine la version actuelle des assets.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(ServerRequestInterface $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Définit les donnees partagés par défaut.
     *
     * @see https://inertiajs.com/shared-data
     */
    public function share(ServerRequestInterface $request): array
    {
		return array_merge(parent::share($request), [
            "auth" => function () use ($request) {
				$user = auth()->user();
                return [
                    "user" => $user ? [
                        "id"       => $user->id,
                        "username" => $user->username,
                    ] : null
                ];
            },
			'flash' => fn() => session()->getFlashdata()
        ]);
    }
}
