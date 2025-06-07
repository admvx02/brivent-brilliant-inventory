<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'key',
    'page' => null,
    'title',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'key',
    'page' => null,
    'title',
]); ?>
<?php foreach (array_filter(([
    'key',
    'page' => null,
    'title',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>


<?php if (isset($component)) { $__componentOriginal36f68fca2c6625d1435d035c49146213 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36f68fca2c6625d1435d035c49146213 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tables::components.selection.checkbox','data' => ['wire:key' => $this->getId() . 'table.bulk_select_group.checkbox.' . $page,'label' => __('filament-tables::table.fields.bulk_select_group.label', ['title' => $title]),'xBind:checked' => '
        const recordsInGroup = getRecordsInGroupOnPage(' . \Illuminate\Support\Js::from($key) . ')

        if (recordsInGroup.length && areRecordsSelected(recordsInGroup)) {
            $el.checked = true

            return \'checked\'
        }

        $el.checked = false

        return null
    ','xOn:click' => 'toggleSelectRecordsInGroup(' . \Illuminate\Support\Js::from($key) . ')','class' => 'fi-ta-group-checkbox']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tables::selection.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->getId() . 'table.bulk_select_group.checkbox.' . $page),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('filament-tables::table.fields.bulk_select_group.label', ['title' => $title])),'x-bind:checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('
        const recordsInGroup = getRecordsInGroupOnPage(' . \Illuminate\Support\Js::from($key) . ')

        if (recordsInGroup.length && areRecordsSelected(recordsInGroup)) {
            $el.checked = true

            return \'checked\'
        }

        $el.checked = false

        return null
    '),'x-on:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('toggleSelectRecordsInGroup(' . \Illuminate\Support\Js::from($key) . ')'),'class' => 'fi-ta-group-checkbox']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal36f68fca2c6625d1435d035c49146213)): ?>
<?php $attributes = $__attributesOriginal36f68fca2c6625d1435d035c49146213; ?>
<?php unset($__attributesOriginal36f68fca2c6625d1435d035c49146213); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal36f68fca2c6625d1435d035c49146213)): ?>
<?php $component = $__componentOriginal36f68fca2c6625d1435d035c49146213; ?>
<?php unset($__componentOriginal36f68fca2c6625d1435d035c49146213); ?>
<?php endif; ?>

<?php /**PATH /Users/macairm120201/Documents/brivent-main/vendor/filament/tables/src/../resources/views/components/selection/group-checkbox.blade.php ENDPATH**/ ?>