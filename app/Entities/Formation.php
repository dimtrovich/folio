<?php

namespace App\Entities;

use BlitzPHP\Wolke\Model;

class Formation extends Model
{
    /**
     * {@inheritDoc}
     */
    protected array $fillable = [
        'titre', 'active',
        'ecole', 'departement',
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
