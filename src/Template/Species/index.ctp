<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Lista gatunków'), ['controller' => 'Species', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="species index large-9 medium-8 columns content">
    <h3><?= __('Wybierz gatunek') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', 'Nazwa') ?></th>
                <th scope="col" class="actions"><?= __('Akcje') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($species as $species): ?>
            <tr>
                <td><?= $this->Number->format($species->id) ?></td>
                <td><?= h($species->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Wybierz'), ['action' => 'index', 'controller' => 'Games', $species->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
