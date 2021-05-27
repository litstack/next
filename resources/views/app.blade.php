<div id="app">
    <{{ $component->name }} 
        v-bind="{!! htmlspecialchars(json_encode($component->getProps(), JSON_PRETTY_PRINT), ENT_QUOTES, 'UTF-8') !!}"
    ></{{ $component->name }}>
</div>