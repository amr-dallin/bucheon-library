<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $id
 * @property string $fullname
 * @property string $telephone
 * @property string|null $email
 * @property string $body
 * @property bool $is_new
 * @property bool $is_completed
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime|null $date_modified
 */
class Question extends Entity
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
        'fullname' => true,
        'telephone' => true,
        'email' => true,
        'body' => true,
        'is_new' => true,
        'is_completed' => true,
        'date_created' => true,
        'date_modified' => true,
    ];
}
