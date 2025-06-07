<div
    <?php echo e($attributes
            ->merge([
                'id' => $getId(),
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH /Users/macairm120201/Documents/brivent-main/vendor/filament/forms/src/../resources/views/components/grid.blade.php ENDPATH**/ ?>