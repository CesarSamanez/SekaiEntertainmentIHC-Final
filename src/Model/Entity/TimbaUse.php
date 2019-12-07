<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TimbaUse Entity
 *
 * @property int $id
 * @property int $timbas_id
 * @property int $users_id
 * @property int $people
 * @property \Cake\I18n\FrozenTime $time
 * @property float|null $total
 * @property \Cake\I18n\FrozenTime $initial_date
 * @property \Cake\I18n\FrozenTime $final_date
 *
 * @property \App\Model\Entity\Timba $timba
 * @property \App\Model\Entity\User $user
 */
class TimbaUse extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'timbas_id' => true,
        'users_id' => true,
        'people' => true,
        'time' => true,
        'total' => true,
        'initial_date' => true,
        'final_date' => true,
        'timba' => true,
        'user' => true
    ];
}
