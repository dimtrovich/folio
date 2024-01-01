<?php 

namespace Folio\Admin\Controllers;

use BlitzPHP\Validation\Rule;
use Folio\Admin\Entities\Competence;

class CompetencesController extends AdminController
{
    public function index()
    {
		$search   = $this->request->search;

		$competences = Competence::when($search, function ($query) use ($search) {
				$query->whereLike("nom", $search);
			})
            ->latest()
            ->paginate($this->request->query('limit', 5))
			->toArray();

		foreach ($competences['data'] as &$competence) {
			if (!empty($competence['metadata'])) {
				if (!empty($competence['metadata']['icone'])) {
					$competence['icone'] = $competence['metadata']['icone'];
					unset($competence['metadata']['icone']);
				}
				if (!empty($competence['metadata']['couleur'])) {
					$competence['couleur'] = $competence['metadata']['couleur'];
					unset($competence['metadata']['couleur']);
				}
			}
		}

		$data['competences'] = $competences;

		return inertia('Competences/Index', $data);
    }

	public function create()
	{
		$validated = $this->request->validate([
			'nom'         => ['required', 'string', Rule::unique('competences')],
			'niveau'      => ['required', 'integer'],
			'description' => ['nullable', 'string'],
			'active'      => ['nullable', 'boolean'],
			'icone'       => ['nullable', 'string'],
			'couleur'     => ['nullable', 'string'],
			'metadata'    => ['nullable', 'json'],
		])->all();

		if (!empty($validated['metadata'])) {
			$validated['metadata'] = json_decode($validated['metadata'], true);
		} else {
			$validated['metadata'] = [];
		}

		if (!empty($validated['icone'])) {
			$validated['metadata'] = array_merge($validated['metadata'], ['icone' => $validated['icone']]);
			unset($validated['icone']);
		}
		if (!empty($validated['couleur'])) {
			$validated['metadata'] = array_merge($validated['metadata'], ['couleur' => $validated['couleur']]);
			unset($validated['couleur']);
		}

		$validated = array_filter($validated, fn($v, $k) => $k === 'active' || !empty($v), ARRAY_FILTER_USE_BOTH);

		Competence::create($validated);

		return back()->with('success', 'Competence ajoutée avec succès');
	}
	
	public function update($id) 
	{
		$validated = $this->request->validate([
			'nom'         => ['required', 'string', Rule::unique('competences')->ignore($id)],
			'niveau'      => ['required', 'integer'],
			'description' => ['nullable', 'string'],
			'active'      => ['nullable', 'boolean'],
			'icone'       => ['nullable', 'string'],
			'couleur'     => ['nullable', 'string'],
			'metadata'    => ['nullable', 'json'],
		])->all();

		if (!empty($validated['metadata'])) {
			$validated['metadata'] = json_decode($validated['metadata'], true);
		} else {
			$validated['metadata'] = [];
		}

		if (!empty($validated['icone'])) {
			$validated['metadata'] = array_merge($validated['metadata'], ['icone' => $validated['icone']]);
			unset($validated['icone']);
		}
		if (!empty($validated['couleur'])) {
			$validated['metadata'] = array_merge($validated['metadata'], ['couleur' => $validated['couleur']]);
			unset($validated['couleur']);
		}
			
		$validated = array_filter($validated, fn($v, $k) => $k === 'active' || !empty($v), ARRAY_FILTER_USE_BOTH);

		$competence = Competence::findOrFail($id);
		$competence->update($validated);
		
		return back()->with('success', 'Compétence modifiée avec succès');
	}
		
	public function delete($id)
	{
		Competence::where('id', $id)->delete();
			
		return back()->with('success', 'Competence supprimée avec succès');
	}
}
