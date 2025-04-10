<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResearchVerifications Model
 *
 * @property \App\Model\Table\ResearchTable&\Cake\ORM\Association\BelongsTo $Research
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ResearchVerification newEmptyEntity()
 * @method \App\Model\Entity\ResearchVerification newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ResearchVerification> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ResearchVerification get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ResearchVerification findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ResearchVerification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ResearchVerification> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ResearchVerification|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ResearchVerification saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ResearchVerification>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ResearchVerification>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ResearchVerification>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ResearchVerification> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ResearchVerification>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ResearchVerification>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ResearchVerification>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ResearchVerification> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ResearchVerificationsTable extends Table
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

        $this->setTable('research_verifications');
        $this->setDisplayField('status');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Research', [
            'foreignKey' => 'research_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->integer('research_id')
            ->notEmptyString('research_id');

        $validator
            ->boolean('verifikasi')
            ->allowEmptyString('verifikasi');

        $validator
            ->scalar('keterangan')
            ->maxLength('keterangan', 255)
            ->allowEmptyString('keterangan');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
