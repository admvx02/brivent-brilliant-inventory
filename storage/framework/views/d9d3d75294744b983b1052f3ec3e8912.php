<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['entry']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['entry']); ?>
<?php foreach (array_filter((['entry']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal5235065006f6f2f35bec5ed2e6525916 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5235065006f6f2f35bec5ed2e6525916 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-infolists::components.entry-wrapper.index','data' => ['entry' => $entry]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-infolists::entry-wrapper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['entry' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($entry)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5235065006f6f2f35bec5ed2e6525916)): ?>
<?php $attributes = $__attributesOriginal5235065006f6f2f35bec5ed2e6525916; ?>
<?php unset($__attributesOriginal5235065006f6f2f35bec5ed2e6525916); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5235065006f6f2f35bec5ed2e6525916)): ?>
<?php $component = $__componentOriginal5235065006f6f2f35bec5ed2e6525916; ?>
<?php unset($__componentOriginal5235065006f6f2f35bec5ed2e6525916); ?>
<?php endif; ?><?php /**PATH /Users/macairm120201/Documents/brivent-main/storage/framework/views/7448f664516c5ae680493f537657bcc3.blade.php ENDPATH**/ ?>