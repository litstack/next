<?php

namespace Tests\Ui;

use Ignite\Contracts\Ui\Component;
use Ignite\Form\Fields\Textarea;
use Illuminate\Testing\AssertableJsonString;
use PHPUnit\Framework\TestCase;

class FieldTextareaTest extends TestCase
{
    public function testRows()
    {
        $field = (new Textarea('foo'))->rows(5);
        $this->assertSame(5, $field->rows);
    }

    public function testComponent()
    {
        $field = new Textarea('foo');
        $this->assertInstanceOf(Component::class, $component = $field->getComponent());
        $props = new AssertableJsonString($component->getProps());
        $this->assertArrayHasKey('textareaComponent', $props->json);
        $this->assertInstanceOf(Component::class, $props['textareaComponent']);
    }
}
