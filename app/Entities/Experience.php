<?php

namespace App\Entities;

use BlitzPHP\Wolke\Model;

class Experience extends Model
{
    /**
     * {@inheritDoc}
     */
    protected array $fillable = [
        'titre', 'active',
        'type_experience', 'type_contrat', 'type_travail',
        'role', 'entreprise',
        'date_deb', 'date_fin',
		'description', 'metadata',
    ];

	/**
	 * {@inheritDoc}
	 */
	protected array $casts = [
		'active'   => 'boolean',
		'date_deb' => 'date',
		'date_fin' => 'date',
		'metadata' => 'json',
	];
}
