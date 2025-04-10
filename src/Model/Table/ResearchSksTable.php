<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResearchSks Model
 *
 * @property \App\Model\Table\ResearchTable&\Cake\ORM\Association\BelongsTo $Research
 *
 * @method \App\Model\Entity\ResearchSk newEmptyEntity()
 * @method \App\Model\Entity\ResearchSk newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ResearchSk> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ResearchSk get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ResearchSk findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ResearchSk patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ResearchSk> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ResearchSk|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ResearchSk saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ResearchSk>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ResearchSk>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ResearchSk>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ResearchSk> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ResearchSk>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ResearchSk>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ResearchSk>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ResearchSk> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ResearchSksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('research_sks');
        $this->setDisplayField('no_sk');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Research', [
            'foreignKey' => 'research_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('no_sk')
            ->maxLength('no_sk', 191)
            ->requirePresence('no_sk', 'create')
            ->notEmptyString('no_sk');

        $validator
            ->integer('research_id')
            ->notEmptyString('research_id');

        $validator
            ->boolean('tandatangan')
            ->allowEmptyString('tandatangan');

        $validator
            ->date('tanggal_ttd')
            ->allowEmptyDate('tanggal_ttd');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['research_id'], 'Research'), ['errorField' => 'research_id']);

        return $rules;
    }
}
