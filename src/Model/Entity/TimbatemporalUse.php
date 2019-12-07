<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TimbaTemporalUse Entity
 *
 * @property int $id
 * @property int $timbas_id
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date
 *
 * @property \App\Model\Entity\Timba $timba
 */
class TimbaTemporalUse extends Entity
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
        'status' => true,
        'date' => true,
        'timba' => true
    ];
}
