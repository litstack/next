<?php

namespace Tests\Ui;

use Ignite\Contracts\Ui\Component;
use Ignite\Form\Fields\Checkboxes;
use Illuminate\Testing\AssertableJsonString;
use PHPUnit\Framework\TestCase;

class FieldCheckboxesTest extends TestCase
{
    public function testOptionsGetter()
    {
        $field = new Checkboxes('foo', ['bar' => 'Bar']);
        $this->assertEquals(['bar' => 'Bar'], $field->getOptions());
    }

    public function testComponent()
    {
        $field = new Checkboxes('foo', ['bar' => 'Bar']);
        $this->assertInstanceOf(Component::class, $component = $field->getComponent());
        $props = new AssertableJsonString($component->getProps());
        $props->assertFragment([
            'attribute' => 'foo',
            'options'   => ['bar' => 'Bar'],
        ]);
        $this->assertArrayHasKey('checkboxComponent', $props->json);
        $this->assertInstanceOf(Component::class, $props['checkboxComponent']);
    }
}
