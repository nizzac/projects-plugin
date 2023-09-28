<div data-control="toolbar">
    <a
<<<<<<< HEAD
        href="<?= Backend::url('impelling/projects/projects/create') ?>"
=======
        href="<?= Backend::url('unspun/projects/projects/create') ?>"
>>>>>>> add-access-tokens
        class="btn btn-primary oc-icon-plus">
        <?= e(trans('backend::lang.list.create_button', ['name'=>'Project'])) ?>
    </a>

    <button
        class="btn btn-danger oc-icon-trash-o"
        data-request="onDelete"
        data-list-checked-trigger
        data-list-checked-request
        data-stripe-load-indicator>
        <?= e(trans('backend::lang.list.delete_selected')) ?>
    </button>
</div>
