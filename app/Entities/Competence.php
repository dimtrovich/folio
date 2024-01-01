<?php

namespace App\Entities;

use BlitzPHP\Wolke\Model;

class Competence extends Model
{
    /**
     * {@inheritDoc}
     */
    protected array $fillable = [
        'nom', 'active', 'niveau',
		'description', 'metadata',
    ];

	/**
	 * {@inheritDoc}
	 */
	protected array $casts = [
		'active'   => 'boolean',
		'metadata' => 'json',
	];
}
