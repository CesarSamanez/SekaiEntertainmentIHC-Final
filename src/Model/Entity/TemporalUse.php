<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TemporalUse Entity
 *
 * @property int $id
 * @property int $tables_id
 * @property bool $status
 * @property \Cake\I18n\FrozenTime|null $date
 *
 * @property \App\Model\Entity\Table $table
 */
class TemporalUse extends Entity
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
        'tables_id' => true,
        'status' => true,
        'date' => true,
        'table' => true
    ];
}
