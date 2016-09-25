<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Lista gatunków'), ['controller' => 'Species', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="games index large-9 medium-8 columns content">
    <h3><?= __('Gry') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('species_id', 'Gatunek') ?></th>
                <th scope="col"><?= $this->Paginator->sort('publisher_id', 'Wydawca') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', 'Nazwa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('release_date', 'Data wydania') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price', 'Cena') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity', 'Ilość') ?></th>
                <th scope="col" class="actions"><?= __('Akcje') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($games as $game): ?>
            <tr>
                <td><?= $this->Number->format($game->id) ?></td>
                <td><?= $game->has('species') ? $this->Html->link($game->species->name, ['controller' => 'Species', 'action' => 'view', $game->species->id]) : '' ?></td>
                <td><?= $game->has('publisher') ? $this->Html->link($game->publisher->name, ['controller' => 'Publishers', 'action' => 'view', $game->publisher->id]) : '' ?></td>
                <td><?= h($game->name) ?></td>
                <td><?= h($game->release_date) ?></td>
                <td><?= $this->Number->format($game->price) ?></td>
                <td><?= $this->Number->format($game->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Kup'), ['action' => 'buy', $game->id]) ?>
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
