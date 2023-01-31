<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PropertyComment Entity
 *
 * @property int $id
 * @property string $property_id
 * @property string $user_id
 * @property string $comments
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\Property $property
 * @property \App\Model\Entity\User $user
 */
class PropertyComment extends Entity
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
        'property_id' => true,
        'user_id' => true,
        'comments' => true,
        'created_date' => true,
        'modified_date' => true,
        'property' => true,
        'user' => true,
    ];
}
