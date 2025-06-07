<div
    <?php echo e($attributes
            ->merge($getExtraAttributes(), escape: false)
            ->class(['fi-ta-text-summary grid gap-y-1 px-3 py-4'])); ?>

>
    <!--[if BLOCK]><![endif]--><?php if(filled($label = $getLabel())): ?>
        <span class="text-sm font-medium text-gray-950 dark:text-white">
            <?php echo e($label); ?>

        </span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <span class="text-sm text-gray-500 dark:text-gray-400">
        <?php echo e($formatState($getState())); ?>

    </span>
</div>
<?php /**PATH /Users/macairm120201/Documents/brivent-main/vendor/filament/tables/src/../resources/views/columns/summaries/text.blade.php ENDPATH**/ ?>