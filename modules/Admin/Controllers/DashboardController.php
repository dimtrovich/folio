<?php 

namespace Folio\Admin\Controllers;

use Folio\Admin\Entities\Competence;
use Folio\Admin\Entities\Experience;
use Folio\Admin\Entities\Formation;
use Folio\Admin\Entities\Projet;

class DashboardController extends AdminController
{
    public function index()
    {
		$stats = fn() => [
			'competences' => Competence::count(),
			'experiences' => Experience::count(),
			'formations'  => Formation::count(),
			'projets'     => Projet::count(),
		];

		return inertia('Home', [
			'stats' => $stats
		]);
    }
}