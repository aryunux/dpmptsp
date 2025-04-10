<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Research Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ResearchSksTable&\Cake\ORM\Association\HasMany $ResearchSks
 * @property \App\Model\Table\ResearchVerificationsTable&\Cake\ORM\Association\HasMany $ResearchVerifications
 *
 * @method \App\Model\Entity\Research newEmptyEntity()
 * @method \App\Model\Entity\Research newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Research> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Research get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Research findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Research patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Research> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Research|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Research saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Research>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Research>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Research>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Research> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Research>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Research>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Research>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Research> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ResearchTable extends Table
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

        $this->setTable('research');
        $this->setDisplayField('judul');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasOne('ResearchSks', [
            'foreignKey' => 'research_id',
        ]);
        $this->hasOne('ResearchVerifications', [
            'foreignKey' => 'research_id',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('judul')
            ->maxLength('judul', 255)
            ->requirePresence('judul', 'create')
            ->notEmptyString('judul');

        $validator
            ->scalar('tujuan')
            ->maxLength('tujuan', 191)
            ->requirePresence('tujuan', 'create')
            ->notEmptyString('tujuan');

        $validator
            ->scalar('lokasi')
            ->requirePresence('lokasi', 'create')
            ->notEmptyString('lokasi');

        $validator
            ->scalar('bidang')
            ->maxLength('bidang', 191)
            ->requirePresence('bidang', 'create')
            ->notEmptyString('bidang');

        $validator
            ->scalar('penanggung_jawab')
            ->maxLength('penanggung_jawab', 191)
            ->requirePresence('penanggung_jawab', 'create')
            ->notEmptyString('penanggung_jawab');

        $validator
            ->scalar('nama_lembaga')
            ->maxLength('nama_lembaga', 191)
            ->requirePresence('nama_lembaga', 'create')
            ->notEmptyString('nama_lembaga');

        $validator
            ->scalar('anggota')
            ->allowEmptyString('anggota');

        $validator
            ->scalar('surat_permohonan')
            ->maxLength('surat_permohonan', 255)
            ->requirePresence('surat_permohonan', 'create')
            ->notEmptyString('surat_permohonan');

        $validator
            ->scalar('surat_pernyataan')
            ->maxLength('surat_pernyataan', 255)
            ->requirePresence('surat_pernyataan', 'create')
            ->notEmptyString('surat_pernyataan');

        $validator
            ->scalar('dokumen_tambahan')
            ->maxLength('dokumen_tambahan', 255)
            ->allowEmptyString('dokumen_tambahan');

        $validator
            ->boolean('submitted')
            ->allowEmptyString('submitted');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
