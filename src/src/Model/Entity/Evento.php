<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evento Entity
 *
 * @property int $id
 * @property string $nome_evento
 * @property \Cake\I18n\FrozenTime $data_inicio
 * @property \Cake\I18n\FrozenTime $data_fim
 * @property string|null $descricao
 * @property \Cake\I18n\FrozenTime|null $data_lembrete
 *
 * @property \App\Model\Entity\Lembrete[] $lembretes
 */
class Evento extends Entity
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
        'nome_evento' => true,
        'data_inicio' => true,
        'data_fim' => true,
        'descricao' => true,
        'data_lembrete' => true,
        'lembretes' => true,
    ];
}
