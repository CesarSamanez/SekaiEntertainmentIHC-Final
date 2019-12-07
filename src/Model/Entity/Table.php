<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Table Entity
 *
 * @property int $id
 * @property float $price
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date
 * @property int $total_uses
 */
class Table extends Entity
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
        'price' => true,
        'status' => true,
        'date' => true,
        'total_uses' => true
    ];
}
