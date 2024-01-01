<?php 

namespace Folio\Admin\Controllers;

use BlitzPHP\Validation\Rule;
use Folio\Admin\Entities\Experience;

class ExperiencesController extends AdminController
{
    public function index()
    {
		$search   = $this->request->search;

		$items = Experience::when($search, function ($query) use ($search) {
				$query->whereLike("nom", $search);
			})
            ->latest()
            ->paginate($this->request->query('limit', 5))
			->toArray();

		foreach ($items['data'] as &$item) {
			if (!empty($item['metadata'])) {
				if (!empty($item['metadata']['icone'])) {
					$item['icone'] = $item['metadata']['icone'];
					unset($item['metadata']['icone']);
				}
				if (!empty($item['metadata']['couleur'])) {
					$item['couleur'] = $item['metadata']['couleur'];
					unset($item['metadata']['couleur']);
				}
			}
		}

		$data['experiences'] = $items;

		return inertia('Experiences/Index', $data);
    }

	public function create()
	{
		$validated = $this->request->validate([
			'nom'         => ['required', 'string', Rule::unique('experiences')],
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

		Experience::create($validated);

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

		$item = Experience::findOrFail($id);
		$item->update($validated);
		
		return back()->with('success', 'Compétence modifiée avec succès');
	}
		
	public function delete($id)
	{
		Experience::where('id', $id)->delete();
			
		return back()->with('success', 'Competence supprimée avec succès');
	}
}