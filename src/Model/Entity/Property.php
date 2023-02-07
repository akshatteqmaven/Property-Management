<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $property_title
 * @property string $property_description
 * @property string property_category
 * @property string $property_image
 * @property string $property_tags
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\PropertyComment[] $property_comments
 */
class Property extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_id' => true,
        'property_title' => true,
        'property_description' => true,
        'property_category' => true,
        'property_categorie_id' => true,
        'property_image' => true,
        'property_tags' => true,
        'status' => true,
        'created_date' => true,
        'modified_date' => true,
        'user' => true,
        'property_comments' => true,
        'user' => true,
        'users_profile' => true,

    ];
}
