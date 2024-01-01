<?php

namespace App\Entities;

use BlitzPHP\Wolke\Model;

class Projet extends Model
{
    /**
     * {@inheritDoc}
     */
    protected array $fillable = [
        'titre', 'active',
        'type_projet', 'url',
        'cover', 'images',
		'description', 'metadata',
    ];

	/**
	 * {@inheritDoc}
	 */
	protected array $casts = [
		'active'   => 'boolean',
		'images'   => 'json',
		'metadata' => 'json',
	];
}
