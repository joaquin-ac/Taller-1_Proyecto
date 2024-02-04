<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination justify-content-center">
        <?php if ($pager->hasPreviousPage()) : ?>
            <li class="page-item">
                <a class="page-link text-dark" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                    <span aria-hidden="true"><<</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link text-dark" href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
                    <span aria-hidden="true"><</span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link): ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link <?= $link['active'] ? 'bg-success text-white' : 'text-dark' ?>" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNextPage()) : ?>
            <li class="page-item">
                <a class="page-link text-dark" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
                    <span aria-hidden="true">></span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link text-dark" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                    <span aria-hidden="true">>></span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>